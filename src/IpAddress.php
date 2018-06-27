<?php

namespace Leonsegal\Forecast;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address', 'city', 'country', 'datetime',
    ];

    public function getForecast($ip)
    {
        return redirect();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function forecast()
    {
        return $this->hasOne(Forecast::class);
    }
}
