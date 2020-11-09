<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Group;
use App\Student;
use Illuminate\Http\Request;

class GroupCtrl extends Controller {

    public function showAll() {
        return view('groups', ['groups' => Group::all()]);
    }

    public function show(Request $request) {
        return view('groupStudents', ['students' => Student::where("group_code", $request->groups)->get()]);
    }

}