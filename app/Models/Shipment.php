<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'courier_id',
        'courier_shipping_option_id',
        'weight',
        'size',
        'tracking'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    public function shippingOption()
    {
        return $this->belongsTo(CourierShippingOption::class, 'courier_shipping_option_id', 'id');
    }
}
