<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    
    protected $table = 'drink';
    protected $primaryKey = 'drink_id';
    
    private $drink_name = 'drink_name';
    private $drink_price = 'drink_price';
    private $drink_image = 'drink_image';
     
	public $timestamps = false;
	     
 




}
