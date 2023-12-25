<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'telp',
        'nationality',
        'dob',
        'coin',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function unusedVouchers() {
        return Voucher::whereNotIn('id', function($query) {
            $query->select('voucher_id')
                ->from('voucher_uses')
                ->where('user_id', $this->id);
        })->get();
    }

    public function review() {
        return $this->hasMany(Waste::class, 'user_id', 'id');
    }
}
