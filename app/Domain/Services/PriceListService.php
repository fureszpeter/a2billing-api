<?php
namespace A2billingApi\Domain\Services;

use A2billingApi\Domain\ValueObjects\Country;
use A2billingApi\Domain\ValueObjects\Rate;
use PDO;

class PriceListService
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Country[]
     */
    public function getCountries()
    {
        $statement = $this->pdo->prepare('SELECT countrycode AS iso3, countryname AS name FROM cc_country ORDER BY countryname ASC');
        $statement->execute();

        $countries = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $countries[] = new Country(
                $row['iso3'],
                $row['name']
            );
        }

        return $countries;
    }

    /**
     * @param int    $tariffGroupId
     * @param string $countryCode
     *
     * @return Rate[]
     */
    public function getRates($tariffGroupId, $countryCode = null)
    {
        $countryFilter = $countryCode
            ? " AND lower(`destination`) LIKE lower(CONCAT(:country_name, '%'))"
            : '';

        $sql = 'SELECT DISTINCT
            `destination`,
            round(`rateinitial`, 2) AS rate,
            round(((`rateinitial`-`buyrate`)/`buyrate`)*100, 2) as revenue,
            round(5 / `rateinitial`) as minutes
            FROM
                `cc_callplan_lcr`
            where
            `tariffgroup_id` = :tariff_group_id ' . $countryFilter . '
            ORDER BY `destination`';

        $statement  = $this->pdo->prepare($sql);
        $bindParams = [
            ':tariff_group_id' => $tariffGroupId,
        ];

        if ($countryCode) {
            $countryName = \A2billingApi\Country::whereCountrycode($countryCode)->firstOrFail()->countryname;
            $bindParams[':country_name'] = $countryName;
        }

        $statement->execute($bindParams);

        $rates = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $rates[] = new Rate(
                $row['destination'],
                $row['rate'],
                $row['revenue']
            );
        }

        return $rates;
    }
}
