<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Donor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * This check if user is auth, if auth then redirect to donate, else show view index
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
            return redirect()->route('donate');

        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:donors',
            'phone' => 'required',
            'group_id' => 'required',
        ]);
        $donor = new Donor($request->all());
        $donor->password = bcrypt($request->password);
        $donor->save();

        return redirect()->route('donate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
