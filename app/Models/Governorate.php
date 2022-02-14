<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'city_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //TODO must change the cities table as one governate has many cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
