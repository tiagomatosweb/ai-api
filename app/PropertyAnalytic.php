<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAnalytic extends Model
{
    protected $fillable = [
        'property_id',
        'analytic_type_id',
        'value',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function analyticType()
    {
        return $this->belongsTo(AnalyticType::class);
    }
}
