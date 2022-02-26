<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'country_name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function complexs()
    {
        return $this->hasMany(Complex::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function governorates()
    {
        return $this->hasMany(Governorate::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
