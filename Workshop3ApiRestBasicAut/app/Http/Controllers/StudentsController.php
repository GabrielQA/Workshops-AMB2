<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index()
    {
        return response()->json(['details'=> Students::all()], 200);
    }

    public function create(Request $request)
    {
        Students::create([
            'firstname' => $request->input('firstname'),
            'lastname'  => $request->input('lastname'),
            'email'  =>  $request->input('email'),
            'address'  => $request->input('address')
        ]);
        return response()->json(['details'=> Students::all()], 201);
    }

    public function showbyid($id)
    {
        $student = Students::find($id);
        return response()->json($student);
    }

    public function show()
    {
        return response()->json(['details'=> Students::all()], 200);
    }

    public function updatebyid(Request $request, $id)
    {
        $student = Students::find($id);
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->save();
        return response()->json(['details'=> Students::all()], 200);
    }

    public function deletebyid(Students $students, $id)
    {
        $student = Students::find($id);
        $student->delete();
        return response()->json(['details'=> Students::all()], 200);
    }
}
