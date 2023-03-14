<?php
namespace App\Http\Controllers;


use App\Models\Aspeet;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AspeetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Aspeet::all()->where("id",1)->first()->element;

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspeet $aspeet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspeet $aspeet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspeet $aspeet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspeet $aspeet)
    {
        //
    }
}
