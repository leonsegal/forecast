<?php

namespace Leonsegal\Forecast;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data', 'ip_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }
}
