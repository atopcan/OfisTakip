<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Calender extends Model
{
    use Notifiable;
    public $timestamps = false;
    protected $fillable = ['personel_id','months','days','note'];
}
