<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
