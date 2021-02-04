<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required',
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',
        ]);
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count()!=0){
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if(password_verify($password,$hashp)){
                return view('bienvenido');
            }else{
                return back()->withErrors(['password'=>'Contraseña no valida'])->withInput([request('password')]);
            }
        }
        else
        {
            return back()->withError(['name'=>'Usuario no valido'])->withInput([request('name')]);
         }
    }
}
