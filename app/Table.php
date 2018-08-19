<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    
    protected $table = 'table';
    protected $fillable = ['table_id','table_name','table_status'];
    
    protected $primaryKey = 'table_id';
    private $table_name = 'table_name';
    private $table_status = 'table_status';
     
	public $timestamps = false;
	     
 	




}
