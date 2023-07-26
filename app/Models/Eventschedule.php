<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventschedule extends Model
{
    use HasFactory;
    protected $fillable=['eventname_id','event_date','title','time','artist_name'];

    public function evntname(){
        return $this->belongsTo(Eventname::class,'eventname_id','id');
    }
}
