<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Hash;

class StudentCtrl extends Controller {

    public function listAll(){
        return Student::all();
    }

    public function insert(Request $request){

        if(Student::find($request->login) != null){
            return view('error', ['errmsg' => "Login déjà enregistré!"]);
        }

        $student = new Student;

        $student->login = $request->login;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->password =  Hash::make($request->password);
        $student->group_code = $request->groupe;
        $student->save();

        return redirect('/');
    }

    public function exist($login){
        if(Student::find($login) != null){
            return 1;
        } else {
            return 0;
        }
    }
}