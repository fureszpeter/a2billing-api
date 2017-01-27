<?php

namespace A2billingApi;

use Illuminate\Database\Eloquent\Model;

/**
 * A2billingApi\Subscription
 *
 * @property int    $id
 * @property string $creationdate
 * @property string $firstusedate
 * @property string $expirationdate
 * @property int    $enableexpire
 * @property int    $expiredays
 * @property string $username
 * @property string $useralias
 * @property string $uipass
 * @property float  $credit
 * @property int    $tariff
 * @property int    $id_didgroup
 * @property string $activated
 * @property int    $status
 * @property string $lastname
 * @property string $firstname
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $phone
 * @property string $email
 * @property string $fax
 * @property int    $inuse
 * @property int    $simultaccess
 * @property string $currency
 * @property string $lastuse
 * @property int    $nbused
 * @property int    $typepaid
 * @property int    $creditlimit
 * @property int    $voipcall
 * @property int    $sip_buddy
 * @property int    $iax_buddy
 * @property string $language
 * @property string $redial
 * @property int    $runservice
 * @property int    $nbservice
 * @property int    $id_campaign
 * @property int    $num_trials_done
 * @property float  $vat
 * @property string $servicelastrun
 * @property float  $initialbalance
 * @property int    $invoiceday
 * @property int    $autorefill
 * @property string $loginkey
 * @property string $mac_addr
 * @property int    $id_timezone
 * @property string $tag
 * @property int    $voicemail_permitted
 * @property int    $voicemail_activated
 * @property string $last_notification
 * @property string $email_notification
 * @property int    $notify_email
 * @property int    $credit_notification
 * @property int    $id_group
 * @property string $company_name
 * @property string $company_website
 * @property string $vat_rn
 * @property int    $traffic
 * @property string $traffic_target
 * @property float  $discount
 * @property bool   $restriction
 * @property int    $id_seria
 * @property int    $serial
 * @property bool   $block
 * @property string $lock_pin
 * @property string $lock_date
 * @property int    $max_concurrent
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCreationdate($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereFirstusedate($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereExpirationdate($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereEnableexpire($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereExpiredays($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereUseralias($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereUipass($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereTariff($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIdDidgroup($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereZipcode($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereInuse($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereSimultaccess($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCurrency($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLastuse($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereNbused($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereTypepaid($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCreditlimit($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereVoipcall($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereSipBuddy($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIaxBuddy($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereRedial($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereRunservice($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereNbservice($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIdCampaign($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereNumTrialsDone($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereVat($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereServicelastrun($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereInitialbalance($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereInvoiceday($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereAutorefill($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLoginkey($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereMacAddr($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIdTimezone($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereTag($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereVoicemailPermitted($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereVoicemailActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLastNotification($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereEmailNotification($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereNotifyEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCreditNotification($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIdGroup($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCompanyName($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereCompanyWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereVatRn($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereTraffic($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereTrafficTarget($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereRestriction($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereIdSeria($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereSerial($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereBlock($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLockPin($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereLockDate($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\Subscription whereMaxConcurrent($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\A2billingApi\Payment[] $payments
 */
class Subscription extends Model
{
    public $timestamps = false;

    protected $connection = 'a2billing';

    protected $table = 'card';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('A2billingApi\Payment', 'customers_id');
    }
}
