<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $connection = 'mysql_2';
	
    protected $table = 'jobs';
}
