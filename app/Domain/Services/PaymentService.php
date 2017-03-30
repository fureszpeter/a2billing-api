<?php
namespace A2billingApi\Domain\Services;

use A2billingApi\Domain\ValueObjects\CreatePaymentRequest;
use A2billingApi\Payment;
use DateTimeImmutable;
use DB;

class PaymentService
{
    const CURRENCY = 'USD';

    /**
     * @param CreatePaymentRequest $request
     *
     * @return int
     */
    public function createPayment(CreatePaymentRequest $request)
    {
        $subscription = $request->getSubscription();

        $payment                          = new Payment();
        $payment->customers_id            = $subscription->id;
        $payment->customers_name          = sprintf(
            '%s %s',
            $subscription->firstname,
            $subscription->lastname
        );
        $payment->customers_email_address = $subscription->email;
        $payment->item_name               = 'balance';
        $payment->item_id                 = $subscription->username;
        $payment->item_quantity           = $request->getQuantity();
        $payment->payment_method          = $request->getMethod();
        $payment->cc_number               = 'XXXXXXXXXXXX';
        $payment->cc_expires              = '-';
        $payment->orders_status           = '2';
        $payment->orders_amount           = $request->getPayedAmount();
        $payment->last_modified           = new DateTimeImmutable();
        $payment->date_purchased          = $request->getDateOfPurchase();
        $payment->orders_date_finished    = new DateTimeImmutable();
        $payment->currency                = self::CURRENCY;
        $payment->currency_value          = 1;


        DB::connection('a2billing')->transaction(function () use ($payment, $subscription, $request) {
            DB::connection('a2billing')->update(
                'UPDATE cc_card SET
                          status = 1,
                          credit = credit + :credit_value, 
                          activated = \'t\', 
                          expirationdate = (CURRENT_TIMESTAMP + INTERVAL 1 YEAR)
                        WHERE 
                          id=:subscription_id',
                [
                    'credit_value' => $request->getCreditValue(),
                    'subscription_id' => $subscription->id
                ]
            );

            $payment->save();
        });

        return $payment->id;
    }
}
