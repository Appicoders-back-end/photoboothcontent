<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_CUSTOMER = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'role',
        'contact_no',
        'email',
        'password',
        'stripe_customer_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userSubcription()
    {
        return $this->hasMany(UserSubscription::class, 'user_id');
    }

    public function userCoupon()
    {
        return $this->hasMany(UserCoupon::class, 'user_id');
    }

    public function hasMembership()
    {
        if (!auth()->user()) {
            return false;
        }

        $membership = UserSubscription::where('user_id', auth()->user()->id)->exists();

        if ($membership) {
            return true;
        } else {
            return false;
        }
    }

    public function contactNo()
    {
        if (!$this->contact_no) {
            return null;
        }

        return "+1 (" . substr($this->contact_no, 0, 3) . ") " . substr($this->contact_no, 3, 3) . "-" . substr($this->contact_no, 6);
    }
}
