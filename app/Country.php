<?php

namespace A2billingApi;

use Illuminate\Database\Eloquent\Model;

/**
 * A2billingApi\Country
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $countrycode
 * @property string $countryprefix
 * @property string $countryname
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Country whereCountrycode($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Country whereCountryprefix($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Country whereCountryname($value)
 */
class Country extends Model
{
    public $timestamps = false;

    protected $connection = 'a2billing';

    protected $table = 'country';
}
