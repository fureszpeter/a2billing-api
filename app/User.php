<?php

namespace A2billingApi;

use Illuminate\Foundation\Auth\User as Authenticatable;
use JsonSerializable;

/**
 * A2billingApi\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\A2billingApi\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JsonSerializable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
