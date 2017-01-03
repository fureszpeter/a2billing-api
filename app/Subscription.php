<?php

namespace A2billingApi;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $connection = 'a2billing';

    protected $table = 'card';
}
