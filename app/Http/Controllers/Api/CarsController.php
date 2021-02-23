<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::get()->toJson(JSON_PRETTY_PRINT);
        return response($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cars = new Cars;
        $this->validate($request, [
            'engine_volume' => ['required'],
            'number_of_seats' => ['required', 'integer'],
            'body_type' => ['required', 'string'],
            ]);
        $cars->engine_volume = $request->engine_volume;
        $cars->number_of_seats = $request->number_of_seats;
        $cars->body_type = $request->body_type;
        $cars->save();

        return response()->json([
            "message" => "Car record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (Cars::where('id', $id)->exists()) {
            $book = Cars::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'engine_volume' => ['required'],
            'number_of_seats' => ['required', 'integer'],
            'body_type' => ['required', 'string'],
        ]);
        if (Cars::find($id)->exists()) {
            $cars = Cars::find($id);
            $cars->engine_volume = is_null($request->engine_volume)
                ? $cars->engine_volume
                : $request->engine_volume;
            $cars->number_of_seats = is_null($request->number_of_seats)
                ? $cars->number_of_seats
                : $request->number_of_seats;
            $cars->body_type = is_null($request->body_type)
                ? $cars->body_type
                : $request->body_type;
            $cars->save();
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(Cars::where('id', $id)->exists()) {
            $book = Cars::find($id);
            $book->delete();
            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }
}
