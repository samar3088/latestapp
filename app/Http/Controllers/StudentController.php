<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('welcome',compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = new Student();

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();

        return redirect(route('home'))->with('successMsg','Student Created Successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit',compact('student'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = Student::findOrFail($id);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();

        return redirect(route('home'))->with('successMsg','Student Updated Successfully');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect(route('home'))->with('successMsg','Student deleted Successfully');
    }
}
