<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'governorate_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function complexs()
    {
        return $this->hasMany(Complex::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    protected $dates = ['deleted_at'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
