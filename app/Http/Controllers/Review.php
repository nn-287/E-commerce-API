<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use http\Env\Response;
use Illuminate\Http\Request;
//use App\Models\review;

class Review extends Controller
{
    public function index(\App\Models\product $product)
    {
        return ReviewResource::collection($product->review);
        //return \App\Models\review::all();

        //return (new \App\Models\product)->review();


    }


    public function store (ReviewRequest $request,\App\Models\product $product)
    {
        //return $product;

        $review = new \App\Models\review($request->all());
        $product->review()->save($review);

        return response([

            'data'=>new ReviewResource($review)
        ],\Illuminate\Http\Response::HTTP_CREATED);

    }



    public function update(Request $request,\App\Models\product $product, \App\Models\review $review)
    {
        $review->update($request->all());

        return response([

            'data'=>new ReviewResource($review)
        ],\Illuminate\Http\Response::HTTP_CREATED);

    }



    public function destroy(\App\Models\product $product,\App\Models\review $review)
    {
        $review->delete();

        return response(null,\Illuminate\Http\Response::HTTP_NO_CONTENT);

    }
}
