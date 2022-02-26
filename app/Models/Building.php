<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function complex()
    {
        return  $this->belongsTo(Complex::class);
    }

    public function city()
    {
        return  $this->belongsTo(City::class);
    }

    public function governorate()
    {
        return  $this->belongsTo(Governorate::class);
    }

    public function country()
    {
        return  $this->belongsTo(Country::class);
    }
}
