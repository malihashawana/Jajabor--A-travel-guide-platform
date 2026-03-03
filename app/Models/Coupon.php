<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'expiration_date',
        'status',
    ];

    /**
     * Check if the coupon is valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->status === 'active' && $this->expiration_date > now();
    }
}
