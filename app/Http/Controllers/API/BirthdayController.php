<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Birthday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BirthdayResource;
use App\Http\Resources\BirthdaysResource;

class BirthdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BirthdaysResource(Auth::user()->birthdays()->paginate(2));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $birthday = new Birthday($request->all());
        $birthday->save();
        return response()->json([
            "message"=> "Birthday Created"
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function show(Birthday $birthday)
    {
        if($birthday->user_id == Auth::user()->id){
            return new BirthdayResource($birthday);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Birthday $birthday)
    {
        if($birthday->user_id == Auth::user()->id){
            $birthday->update($request->all());
            return response()->json([
                "message"=> "Birthday Updated"
            ], 200);
            
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Birthday $birthday)
    {
        if($birthday->user_id == Auth::user()->id){
            $birthday->delete();
            return response()->json([
                "message"=> "Birthday Deleted"
            ], 202);
            
        }
        abort(403);
    }
}
