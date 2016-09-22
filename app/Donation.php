<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    protected $fillable = ['date', 'amount', 'donor_id'];

    /**
     * Get the donor that owns the donations.
     */
    public function donor()
    {
        return $this->belongsTo('App\Donor');
    }
}
