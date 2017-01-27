<?php

namespace A2billingApi\Http\Controllers;

use A2billingApi\Domain\Services\PaymentService;
use A2billingApi\Domain\ValueObjects\CreatePaymentRequest;
use A2billingApi\Payment;
use A2billingApi\Subscription;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class PaymentController extends Controller
{
    /**
     * @param Subscription $subscription
     *
     * @return Subscription
     */
    public function index(Subscription $subscription)
    {
        $payments = $subscription->payments()->getResults();

        return $payments;
    }

    public function show(Subscription $subscription, Payment $payment)
    {
        return $payment;
    }

    /**
     * @param Subscription   $subscription
     * @param PaymentService $paymentService
     * @param Request        $request
     *
     * @return int
     */
    public function create(
        Subscription $subscription,
        PaymentService $paymentService,
        Request $request
    ) {
        /** @var ParameterBag $json */
        $json = $request->json();

        $validator = $this->getValidationFactory()->make($json->all(), [
            "creditValue"    => 'required|numeric|min:0',
            "payedAmount"    => 'required|numeric|min:0',
            "quantity"       => 'required|numeric|min:0',
            "method"         => 'required|alpha|min:0',
            "dateOfPurchase" => 'date_format:' . DATE_ATOM,
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code'   => 422,
                    'errors' => $validator->getMessageBag()->toArray(),
                ],
                422);
        }

        $request = new CreatePaymentRequest(
            $subscription,
            floatval($json->get('creditValue')),
            floatval($json->get('payedAmount')),
            intval($json->get('quantity')),
            $json->get('method')
        );

        if ($json->get('dateOfPurchase', null)) {
            $request->setDateOfPurchase(DateTime::createFromFormat(DATE_ATOM, $json->get('dateOfPurchase', null)));
        }

        return $paymentService->createPayment($request);
    }
}
