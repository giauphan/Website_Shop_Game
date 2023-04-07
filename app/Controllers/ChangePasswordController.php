<?php

namespace App\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Request;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Response
     */
    // public function Convert()
    // {
    //     return view('Page_Convert.page1');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Response
     */
    public function create()
    {
        //
    }
    public function Convert(Request $request)
    {
        return view('main');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Request  $request
     * @return \Illuminate\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Request  $request
     * @param  int  $id
     * @return \Illuminate\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Response
     */
    public function destroy($id)
    {
        //
    }
}
