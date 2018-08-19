<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    
    protected $table = 'order_detail';
    protected $primaryKey = 'od_id';
    private $od_order = 'od_order';
    private $od_drink = 'od_drink'; // id drink
    private $od_amount = 'od_amount'; 
    private $od_status = 'od_status'; 

	public $timestamps = false;
	     
 




}
