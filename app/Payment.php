<?php

namespace A2billingApi;

use Illuminate\Database\Eloquent\Model;

/**
 * A2billingApi\Payment
 *
 * @property int $id
 * @property int $customers_id
 * @property string $customers_name
 * @property string $customers_email_address
 * @property string $item_name
 * @property string $item_id
 * @property int $item_quantity
 * @property string $payment_method
 * @property string $cc_type
 * @property string $cc_owner
 * @property string $cc_number
 * @property string $cc_expires
 * @property int $orders_status
 * @property float $orders_amount
 * @property string $last_modified
 * @property string $date_purchased
 * @property string $orders_date_finished
 * @property string $currency
 * @property float $currency_value
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCustomersId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCustomersName($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCustomersEmailAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereItemName($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereItemQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCcType($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCcOwner($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCcNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCcExpires($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereOrdersStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereOrdersAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereLastModified($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereDatePurchased($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereOrdersDateFinished($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCurrency($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Payment whereCurrencyValue($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    public $timestamps = false;

    protected $connection = 'a2billing';

    protected $table = 'payments';
}
