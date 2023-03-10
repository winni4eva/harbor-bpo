<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function couriers()
    {
        return $this->hasMany(Courier::class, 'company_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany(User::class , 'company_id', 'id');
    }
}
