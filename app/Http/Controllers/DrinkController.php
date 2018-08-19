<?php


namespace App\Http\Controllers;

use App\Drink;
use Illuminate\Http\Request; // mo hinh Dependency Injection

class DrinkController extends Controller{

// 	function getDrink(){
// 		return json_encode(Drink::all());
// 	}
	
	function getDrink(){
		$drink = Drink::all();
// 			$od = OrderDetail::where('od_order',$order->order_id)->get();
			$temp = [];
			foreach ($drink as $key => $value) {
				$temp[] = ["drink_id"=> (int)$value->drink_id,
			            "drink_name"=> $value->drink_name,
			            "drink_price"=> (int)$value->drink_price,
			            "drink_image"=> $value->drink_image
			           ];
			}
// 			return ["listDrink"=>$temp,"order_id"=>$order->order_id];
            return $temp;
	}
	

	function postDrink(Request $request){
		
		// var_dump($request->drink_name);

		$drink = new Drink;

        $drink->drink_name = $request->drink_name;
        $drink->drink_price = (int)$request->drink_price;

        $drink->save();

        return $drink->drink_id;
	}

}

?>