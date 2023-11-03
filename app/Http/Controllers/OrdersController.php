<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;
use App\Models\OrdersDetailModel;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $ordenes = OrdersModel::select()
        ->where('email','like','%'.\Auth::user()->email.'%')
        ->paginate(10);
    
        return view('own.ordenes',compact('ordenes'));
    
    }
    public function detailOrder($id)
    {   
       

        $ordenes = OrdersDetailModel::select()
        ->join("products","detailorders.idproduct","=","products.id")
        ->where('idorder','=',$id)
        ->get();
    
        return response()->json(['data'=> $ordenes,200]);
    
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data =$request->all();
       

        DB::beginTransaction();
        $orders = new OrdersModel;
        
        $orders->name = $data["name"];
        $orders->lastname = $data["lastName"];
        $orders->address = $data["address"];
        $orders->email = $data["email"];
        $orders->state = "comprado";

        $objDetail = json_decode($data["myCar"]);

        $save =$orders->save();
        //dd($save);

        if($save){
           $bolDetail = $this->createDetail($objDetail,$orders->id);
        }

        if($save == true && $bolDetail == false){
            db::commit();
        }else{
            db::rollBack();
            return response()->json(["message" => "error al guardar"],403);
        }


        return response()->json(['data'=> $orders,200]);
    }


    public function createDetail($objDetail,$ordersId){
        
        
       try {
            $bolDetail = false;

            foreach($objDetail as $item){

                $detail = new OrdersDetailModel;
                $detail->idorder = $ordersId;
                $detail->idproduct = $item->id;
                $detail->counts = $item->cantidad;
                $detail->totalprice = $item->cantidad * $item->valor;
                $saveDetail = $detail->save();
                if($saveDetail == false){
                    $bolDetail= true;
                }
            }
            return $bolDetail;
       } catch (\Throwable $th) {
        //log($th);
       }

        

    }

    public function test(){
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdersModel  $ordersModel
     * @return \Illuminate\Http\Response
     */
    public function show(OrdersModel $ordersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdersModel  $ordersModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdersModel $ordersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdersModel  $ordersModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdersModel $ordersModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdersModel  $ordersModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdersModel $ordersModel)
    {
        //
    }
}
