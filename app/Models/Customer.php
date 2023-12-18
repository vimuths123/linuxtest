<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'address',
        'contact',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            // Generate a unique customer code using Str::uuid()
            $customer->code = Str::uuid()->toString();
        });
    }
}
