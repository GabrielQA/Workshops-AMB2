<?php

namespace Tasks;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'task';
    protected $fillable = array('name','details');
}
