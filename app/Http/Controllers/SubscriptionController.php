<?php

namespace A2billingApi\Http\Controllers;

use A2billingApi\Subscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use OutOfBoundsException;

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
     * @param string $pin
     *
     * @throws OutOfBoundsException If subscription not found.
     *
     * @return array
     */
    public function getByPin(string $pin)
    {
        /** @var Collection $subscription */
        $subscription = Subscription::where(['username' => $pin])->get();

        if ($subscription->isEmpty()) {
            throw new OutOfBoundsException(
                sprintf('Subscription not found. [pin: %s]', $pin)
            );
        }

        return $subscription->first();
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Collection
     */
    public function show($id)
    {
        /** @var Collection $subscription */
        $subscription = Subscription::where(['id' => $id])->get();

        if ($subscription->isEmpty()) {
            throw new OutOfBoundsException('Subscription not found.');
        }

        return $subscription;
    }

    /**
     * @return int
     */
    public function count()
    {
        return Subscription::all()->count();
    }
}
