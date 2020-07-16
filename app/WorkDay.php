<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
  protected $fillable = [
    'day',
    'active',
    'moorning_start',
    'moorning_end',
    'afternoon_start',
    'afternoon_end',
    'user_id',
  ];
}
