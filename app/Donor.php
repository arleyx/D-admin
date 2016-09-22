<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table = 'donors';

    protected $fillable = ['name', 'lastname', 'email', 'phone', 'group_id'];

    protected $hidden = ['password', 'remember_token'];
    /**
     * Get the donations for the user.
     */
    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
