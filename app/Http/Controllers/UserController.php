<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $tags = User::orderBy('id' , 'desc')->get();
        return $tags;

     }

     public function store(Request $request){
        //  return $request->all();
        $this->validate($request , [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $User = User::create($data);

        // return $data;
       return $User;

    }

}
