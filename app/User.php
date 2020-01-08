<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $guarded = [
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    // Relation Methods:

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
