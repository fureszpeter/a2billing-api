<?php

namespace A2billingApi\Http\Controllers;

use A2billingApi\Country;
use A2billingApi\Domain\Services\PriceListService;
use A2billingApi\Domain\ValueObjects\Rate;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * @var PriceListService
     */
    private $priceListService;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param PriceListService $priceListService
     * @param Request          $request
     */
    public function __construct(PriceListService $priceListService, Request $request)
    {
        $this->priceListService = $priceListService;
        $this->request          = $request;
    }

    /**
     *
     */
    public function index()
    {
        return $this->priceListService->getCountries();
    }

    /**
     * @param         $tariffId
     * @param Country $country
     *
     * @return Rate[]
     */
    public function priceList($tariffId, Country $country = null)
    {
        return $this->priceListService->getRates($tariffId, $country ? $country->countrycode : null);
    }
}
