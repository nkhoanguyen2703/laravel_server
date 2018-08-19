<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id','order_date','order_table','order_status'];

    private $order_date = 'order_date';
    private $order_table = 'order_table'; //khoa ngoai
    private $order_status = 'order_status'; 
    
	public $timestamps = false;
	     
 




}
