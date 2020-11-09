<?php
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class SessionCtrl extends Controller {

    public function login(Request $request) {
        $student = Student::find($request->login);
        
        if($student === null){
            return view('error', ['errmsg' => "Login inexistant"]);
        }
        
        if(Hash::check($request->password, $student->password)){
            session(['key' => $student->login]);
            session(['studentName' => $student->first_name]);
        
            return redirect('/');
        }

        return view('error', ['errmsg' => "Erreur avec la connexion. Un des champs est erroné."]);
    }

    public function logout(Request $request){
        $request->session()->forget('key');
        $request->session()->forget('studentName');

        return redirect('/');
    }
}
