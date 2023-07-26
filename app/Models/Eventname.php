<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventname extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function evntschedule(){
        return $this->hasMany(Eventschedule::class);
    }
}
