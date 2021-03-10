<?php

namespace App\Http\Controllers;

use App\Models\Birthday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BirthdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birthdays = Auth::user()->birthdays;
        return view('birthday.index',['birthdays' => $birthdays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birthday.create');
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
        return redirect('birthdays')->with('status','Birthday Saved!');
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
            return view('birthday.show',['birthday' => $birthday]);
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function edit(Birthday $birthday)
    {
        if($birthday->user_id == Auth::user()->id){
            return view('birthday.edit', ['birthday' => $birthday]);
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
            return back()->with('status','Birthday Updated!');
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
            return response(['msg'=> 'Success'], 200)->header('Content-Type','application/json');
        }
        abort(403);

    }
}
