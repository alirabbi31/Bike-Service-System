<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'customer_name',
        'phone',
        'chassis_number',
        'km_run',
        'bay_number',
        'service_charge',
        'service_type',
        'start_date',
        'end_date',
        'image',
        'remarks',
    ];

    public function parts()
    {
        return $this->belongsToMany(Part::class)->withPivot('quantity')
        ->withTimestamps();
    }
}
