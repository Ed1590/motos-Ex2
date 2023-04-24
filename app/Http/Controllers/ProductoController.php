<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            //dd($request->name);
            DB::beginTransaction();

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|numeric|max:100000000',
                'amount' => 'required|numeric|max:100',
                'types' => 'required|numeric|max:2',
                'url' => 'required|string|max:255',
            ]);
        
            if($validator->fails()){
                db::rollBack();
                return response()->json($validator->errors());
            }

            $newProduct = new ProductoModel();
            $newProduct->name = $request->name;
            $newProduct->description= $request->description;
            $newProduct->price = $request->price;
            $newProduct->amount = $request->amount;
            $newProduct->types = $request->types;
            $newProduct->url = $request->url;
            $newProduct->create_at = Carbon::now();
          

            $save = $newProduct->save();

            if($save == true){
                db::commit();
                return response()
                ->json(['data'=> $newProduct,
                    'message' => 'producto Creado Correctamente',200]);
              
            }
        } catch (\Throwable $th) {
            db::rollBack();
            return response()->json(["message" => "error al guardar",'error' => $th],403);
        }

       


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
       $producto = ProductoModel::select()
        ->where('id','=',$id)       
        ->get();

        return response()
        ->json(['data'=> $producto,200]);
              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function show($type,$count)
    {
        
        $product = ProductoModel::select()
        ->where('types','=',$type)
        ->take($count)
        ->get();

        return $product;
    }

    public function list() {

        $producto = ProductoModel::all();
        return $producto;

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoModel $productoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoModel $productoModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoModel $productoModel)
    {
        //
    }
}
