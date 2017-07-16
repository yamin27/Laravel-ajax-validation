<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Create_save_table extends Model
{
	protected $table ='create_save_tables';
	
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address',
    ];
}
