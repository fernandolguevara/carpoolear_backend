<?php namespace STS\Entities;

use Illuminate\Database\Eloquent\Model;

class TripPoint extends Model {
	protected $table = 'trips_points';
	protected $fillable = [
        'address', 'json_address', 'lat', 'lng', 'sin_lat', 'sin_lng', 'cos_lat', 'cos_lng', 'trip_id'
    ];

	protected $hidden = [];
    protected $casts = [
        'json_address' => 'array',
    ];


    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = $value;
        $this->attributes['sin_lat'] = sin($value);
        $this->attributes['cos_lat'] = cos($value);
    }

    public function setLngAttribute($value)
    {
        $this->attributes['lng'] = $value;
        $this->attributes['sin_lng'] = sin($value);
        $this->attributes['cos_lng'] = cos($value);
    }

    public function trip() {
        return $this->belongsTo('STS\Entities\Trip', 'trip_id');
    }
    
}