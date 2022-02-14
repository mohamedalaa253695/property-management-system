<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'city_id',
        'governorate_id'
    ];

    public function country()
    {
        return  $this->belongsTo(Country::class);
    }

    public function city()
    {
        return  $this->belongsTo(City::class);
    }
}
