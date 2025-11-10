<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    protected $guarded = [
        'id',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'previous_freelancers' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }


    protected static function booted(): void
    {
        static::creating(function (Client $client) {
            $client->uuid = Str::orderedUuid();
        });
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function works(): HasMany
    {
        return $this->hasMany(Work::class);
    }

    public function myReviews(): HasMany
    {
        return $this->hasMany(Review::class)
            ->where('from', 'client');
    }

    public function freelancerReviews(): HasMany
    {
        return $this->hasMany(Review::class)
            ->where('from', 'freelancer');
    }

    public function phone_number_verified()
    {
        return ['Not Verified', 'Verified'][$this->phone_number_verified];
    }
    public function phone_number_verified_color()
    {
        return ['danger', 'success'][$this->phone_number_verified];
    }

    public function payment_method_verified()
    {
        return ['Not Verified', 'Verified'][$this->payment_method_verified];
    }

    public function payment_method_verified_color()
    {
        return ['danger', 'success'][$this->payment_method_verified];
    }
}
