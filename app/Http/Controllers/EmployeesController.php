<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        echo "<h1>The store has been worked</h1>";
        echo "<a href='/employees/create'>Create</a> <br>";

        $name = $request->input('txtEmpName');
        $gender = $request->input('txtGender');
        $position = $request->input('txtEmpPosition');
        $department = $request->input('txtDept');
        $hired_date = $request->input('hired_date');

        return $name .",". $gender .",". $position .",". $department .",". $hired_date;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('employees.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('employees.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        echo "<h1>The updatae has been worked</h1>";
        echo "<a href='/employees/create'>Create</a> <br>";

        $name = $request->input('txtEmpName');
        $gender = $request->input('txtGender');
        $position = $request->input('txtEmpPosition');
        $department = $request->input('txtDept');
        $hired_date = $request->input('hired_date');

        return $name .",". $gender .",". $position .",". $department .",". $hired_date;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
