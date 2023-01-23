<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class Product extends Controller
{

    public function update(Request $request , \App\Models\product $product)
    {
        //return $request->all();
        $request['detail'] = $request->description;
        unset($request['description']);
        $product->update($request->all());

        return response([
            'data'=>new ProductResource($product)
        ],Response::HTTP_CREATED);

    }


    public function construct()
    {

        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function destroy(\App\Models\product $product)
    {
        return $product->delete();

        return response(null,Response::HTTP_NO_CONTENT);

    }


    public function store(ProductRequest $request)
    {
        //return 'nosa basbosa';
        $product =  new \App\Models\product();
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();

        return response([
            'data'=>new ProductResource($product)
        ],Response::HTTP_CREATED);

        //return $request->all();
    }


    public function index()
    {


        return ProductCollection::collection(\App\Models\product::paginate(20));


    }


    public function show(\App\Models\product $product)
    {


        return new ProductResource($product);





    }
}
