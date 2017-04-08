<?php

namespace A2billingApi\Http\Controllers;

use A2billingApi\Domain\Services\RegistrationService;
use A2billingApi\Domain\ValueObjects\CreateSubscriptionRequest;
use A2billingApi\Domain\ValueObjects\Email;
use A2billingApi\Domain\ValueObjects\Pin;
use A2billingApi\Subscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use OutOfBoundsException;
use Symfony\Component\HttpFoundation\ParameterBag;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        if ($request->exists('pin')) {
            return $this->getByPin(new Pin($request->get('pin')));
        }

        if ($request->exists('email')) {
            return $this->getByEmail(new Email($request->get('email')));
        }

        $limit   = $request->get('limit', 100);
        $afterId = $request->get('afterId', 0);

        /** @var Collection $subscriptions */
        $subscriptions = Subscription::where('id', '>', $afterId)
            ->limit($limit)
            ->orderBy('id', 'asc')
            ->get();

        $last = $subscriptions->last();

        $response = [
            'limit'    => $limit,
            'afterId'  => $afterId,
            'nextPage' => $subscriptions->count() == $limit
                ? route('subscriptions.index', ['afterId' => $last->id])
                : null,

            'subscriptions' => $subscriptions,
        ];

        return $response;
    }

    /**
     * @param Pin $pin
     *
     * @throws OutOfBoundsException If subscription not found.
     *
     * @return array
     */
    private function getByPin(Pin $pin)
    {
        /** @var Collection $subscription */
        $subscription = Subscription::where(['username' => (string)$pin])->get();

        if ($subscription->isEmpty()) {
            throw new OutOfBoundsException(
                sprintf('Subscription not found. [pin: %s]', $pin)
            );
        }

        return $subscription->first();
    }

    /**
     * @param Email $email
     *
     * @return Subscription[]
     */
    private function getByEmail(Email $email)
    {
        /** @var Collection $subscription */
        $subscription = Subscription::where(['email' => (string)$email])->get();

        if ($subscription->isEmpty()) {
            throw new OutOfBoundsException(
                sprintf('Subscription not found. [email: %s]', $email)
            );
        }

        return $subscription->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Subscription $subscription
     *
     * @return Subscription
     */
    public function show(Subscription $subscription)
    {
        return $subscription;
    }

    /**
     * @return int
     */
    public function count()
    {
        return Subscription::all()->count();
    }

    /**
     * @param Subscription        $subscription
     * @param RegistrationService $registrationService
     *
     * @return Subscription
     */
    public function block(Subscription $subscription, RegistrationService $registrationService)
    {
        return $registrationService->block($subscription);
    }

    /**
     * @param Request             $request
     *
     * @param RegistrationService $registrationService
     *
     * @return mixed
     */
    public function create(Request $request, RegistrationService $registrationService)
    {
        /** @var ParameterBag $json */
        $json = $request->json();

        $validator = $this->getValidationFactory()->make($json->all(), [
            "username"  => 'required|unique:a2billing.card,username|digits:10',
            "useralias" => 'required|unique:a2billing.card,useralias|digits:15',
            "uipass"    => 'required',
            "tariff"    => 'required|numeric',
            "firstname" => 'required|regex:/^[\pL\s\-]+$/u',
            "lastname"  => 'required|regex:/^[\pL\s\-]+$/u',
            "city"      => 'required|regex:/^[\pL\s\-]+$/u',
            "country"   => 'required|exists:a2billing.country,countrycode',
            "state"     => 'required_if:country,USA|alpha|size:2',
            "zipcode"   => 'required',
            "email"     => 'required|email',
            "currency"  => 'required|exists:a2billing.currencies,currency',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code'   => 422,
                    'errors' => $validator->getMessageBag()->toArray(),
                ],
                422);
        }

        $createSubscriptionRequest = new CreateSubscriptionRequest(
            $json->get('username'),
            $json->get('useralias'),
            $json->get('uipass'),
            intval($json->get('tariff')),
            $json->get('firstname'),
            $json->get('lastname'),
            $json->get('address'),
            $json->get('city'),
            $json->get('state'),
            $json->get('country'),
            $json->get('zipcode'),
            $json->get('email'),
            $json->get('currency')
        );

        return $registrationService->register($createSubscriptionRequest);
    }
}
