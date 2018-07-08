<?php

namespace A2billingApi\Domain\Services;

use A2billingApi\Domain\ValueObjects\CreateSubscriptionRequest;
use A2billingApi\Subscription;
use DateTime;

class RegistrationService
{
    /**
     * @param CreateSubscriptionRequest $request
     *
     * @return int
     */
    public function register(CreateSubscriptionRequest $request)
    {
        $subscription = new Subscription();

        $subscription->creationdate       = new DateTime();
        $subscription->firstusedate       = null;
        $subscription->expirationdate     = new DateTime('now + 1 year');
        $subscription->enableexpire       = 0;
        $subscription->expiredays         = 365;
        $subscription->username           = $request->getPin();
        $subscription->useralias          = $request->getUserAlias();
        $subscription->uipass             = $request->getPassword();
        $subscription->credit             = floatval(0);
        $subscription->tariff             = $request->getPackage();
        $subscription->activated          = 't';
        $subscription->status             = 1;
        $subscription->lastname           = $request->getLastName();
        $subscription->firstname          = $request->getFirstName();
        $subscription->address            = $request->getAddress();
        $subscription->city               = $request->getCity();
        $subscription->state              = $request->getState() ?: '';
        $subscription->country            = $request->getCountry();
        $subscription->zipcode            = $request->getZipCode();
        $subscription->email              = $request->getEmail();
        $subscription->currency           = $request->getCurrency();
        $subscription->email_notification = $request->getEmail();
        $subscription->notify_email       = 0;

        $subscription->phone           = '';
        $subscription->fax             = '';
        $subscription->redial          = '';
        $subscription->loginkey        = '';
        $subscription->tag             = '';
        $subscription->company_name    = '';
        $subscription->company_website = '';
        $subscription->traffic_target  = '';

        $subscription->save();

        return $subscription->id;
    }

    /**
     * @param Subscription $subscription
     *
     * @return Subscription
     */
    public function block(Subscription $subscription)
    {
        $subscription->block     = true;
        $subscription->status    = 0;
        $subscription->lock_date = (new DateTime());

        $subscription->save();

        return $subscription;
    }
}
