<?php


namespace App\Http\Controllers;

use App\Drink;

class DrinkController extends Controller{

	function getDrink(){
		return json_encode(Drink::all());
	}

}

?>