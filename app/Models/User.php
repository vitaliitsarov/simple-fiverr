<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'iban'
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->iban = self::generateAccountNumber();
        });
    }

    public static function generateAccountNumber()
    {
        // Генерируем уникальный номер счета в формате "ABC-XXXX-XXXX-XXXX"
        $prefix = 'ABC';
        $randomPart = str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);
        $accountNumber = $prefix . '-' . $randomPart;

        // Проверяем, не существует ли уже счет с таким номером
        while (self::where('iban', $accountNumber)->exists()) {
            $randomPart = str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);
            $accountNumber = $prefix . '-' . $randomPart;
        }

        return $accountNumber;
    }
}
