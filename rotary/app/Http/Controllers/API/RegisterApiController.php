<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterApiController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'district' => ['required','string'],
            'ward' => ['required','string'],
            'municipality' => ['required','string'],
            'company' => ['required','string'],
            'number' => ['required','integer'],




        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'district' =>$data['district'],
            'ward' =>$data['ward'],
            'municipality' =>$data['municipality'],
            'company' =>$data['company'],
            'number' =>$data['number']
            ]); 

        //   $user = User::latest()->get();

          if (is_null($user) || empty($user)) {
            return $this->json_response("No clients found", null, 'fail', 200);
        }
        return $this->json_response("Clients fetched.", $user, 'success', 200);



        
    }
}
