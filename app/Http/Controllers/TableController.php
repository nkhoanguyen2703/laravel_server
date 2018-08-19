<?php


namespace App\Http\Controllers;

use App\Table;

use Illuminate\Http\Request; // mo hinh Dependency Injection

class TableController extends Controller{

	function getTable(){
// 		return json_encode(Table::all());
        $table = Table::all();
       
        			$temp = [];
        			foreach ($table as $key => $value) {
        				$temp[] = ["table_id"=> (int)$value->table_id,
        			            "table_name"=> $value->table_name,
        			            "table_status"=> (int)$value->table_status
        			           ];
        			}
      
                    return $temp;
	}

	function getTableById($id){
		$table = new Table;
		$table = $table->where('table_id', $id)->first();
		return json_encode($table);
	}

	
	// function postDrink(Request $request){
		
	// 	var_dump($request->drink_name);

	// 	$drink = new Drink;

 //        $drink->drink_name = $request->drink_name;
 //        $drink->drink_price = $request->drink_price;

 //        $drink->save();
	// }

}

?>