<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function status()
    {
        return $this->belongsTo(PropertyStatus::class);
    }
}
