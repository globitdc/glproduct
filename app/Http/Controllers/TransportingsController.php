<?php

namespace App\Http\Controllers;

use App\Transporting;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class TransportingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validation = Validator::make($request->all(), [
            'startingPoint' => 'required|max:255',
            'endingPoint'   =>  'required|max:255',
            'pickUp'        =>  'required'
        ]);

         if($validation->fails()) {
            return $validation->errors()->first();
        } else {
            $trans = new Transporting;
            $trans->startingPoint = $request->startingPoint;
            $trans->endingPoint = $request->endingPoint;
            $trans->pickUp = $request->pickUp;
            $trans->user_id = auth()->user()->id;
            $trans->save();
            $request->session()->flash('alert-success', 'Ձեր պատվերը հաջողությամբ ընդունվել է');
            return 'testStored';

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transporting  $transporting
     * @return \Illuminate\Http\Response
     */
    public function show(Transporting $transporting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transporting  $transporting
     * @return \Illuminate\Http\Response
     */
    public function edit(Transporting $transporting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transporting  $transporting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transporting $transporting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transporting  $transporting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transporting $transporting)
    {
        //
    }

    public function transporting() {
       return view('transporting');

    }
}











