<?php

namespace App\Http\Controllers;

use App\Order;
use App\Drink;
use App\OrderDetail;
use App\Table;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function makeNewOrder(Request $request){ 



    	//update table status = 1
        // Table::find($request->order_table)->update(['table_status'=>1]);
        Table::where('table_id',$request->order_table)->update(['table_status'=>1]);


		// phải lấy dc giá trị ID của table khi chọn bàn ( trong swift ), s
		// sau đó truyền vào Request
		// var_dump($request->drink_name);
		$order = new Order;
		// var_dump($request->order_date);
		// var_dump($request->all());die;

        $order->order_date = $request->order_date;
        $order->order_table = $request->order_table;
        $order->order_status = $request ->order_status;
        
        
        
        $order->save();

        return $order->order_id;
	}

	//bấm nút order, chỉ gọi hàm này
	function addDrinkToOrder(Request $request){

		//kiem tra co order_id kem theo
		if($request->order_id != null){
			$orderID = $request->order_id;
		}else{
			//khong co order id kem theo
			$orderID = $this->makeNewOrder($request);
		}
		// var_dump($request->all());
		$drink = $request->drink;
		// var_dump($drink);die;
		// $postBody = $drink->all(); 
		// var_dump($postBody);

		$success=true;
		$error = array();
		$data=null;

		foreach ($drink as $key => $obj) {
			$od = new OrderDetail;
			$od->od_order = $orderID;
			$od->od_drink = $obj['od_drink'];
			$od->od_amount = $obj['od_amount'];
			$od->od_status = $obj['od_status'];
			try{
				$od->save();
			}catch (\Exception $e){
				// return ['error'=>$e->getMessage()];
				$error[]=['error'=>$e->getMessage()];
				$success=false;

			}


		}

		return ["success"=>$success,
				"message"=>$error,
				"data"=>$data,
				"order_id"=>$orderID
		];
	}


	function getListDrinkByTable($tableid){
		$order = Order::where('order_table',$tableid)->where('order_status',1)->first();
		
		if($order==null){
			return ["drink"=>[],"order_id"=>null];
		}else{
			$od = OrderDetail::where('od_order',$order->order_id)->get();
			// var_dump($od);die;
			$temp = [];
			foreach ($od as $key => $value) {
				$drink = Drink::find($value->od_drink);
				$temp[] = ["od_id"=> $value->od_id,
			            "od_drink"=> (int)$value->od_drink,
			            "od_amount"=> (int)$value->od_amount,
			            "od_status"=> (int)$value->od_status,
			            "drink_name"=>$drink->drink_name,
			            "drink_price"=>(int)$drink->drink_price,
			            "drink_image"=>$drink->drink_image
			            ];
			}
			return ["drink"=>$temp,"order_id"=>$order->order_id];
		}
	}

	function updateOrderAndTableStatus($tableid){

		Order::where('order_table',$tableid)->where('order_status',1)->update(['order_status'=>0]);
		// Table::find(1)->update(['table_status'=>0]); ko xai dc
		Table::where('table_id',$tableid)->update(['table_status'=>0]);
	}

}
