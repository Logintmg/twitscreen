<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitimage extends Model
{
    protected $fillable = ['status', 'user_id', 'filename', 'url'];
}
