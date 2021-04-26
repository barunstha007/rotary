<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\UserInfo;
use App\Utils\ResponseUtils;


class RegisterApiController extends Controller
{
    use ResponseUtils;

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
            'phone_number' => ['required','integer'],




        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request, User $user)
    {
         $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'phone_number' =>$request->phone_number,

           

            


            ]); 

            // echo($request->phone_number); die();


            $userinfo = UserInfo::create([
                'user_id' => $user->id, 
                'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'district_id' => $request->district_id,
            'municipality_id' => $request->municipality_id,
            'ward_id' => $request->ward_id,
            'company_id' => $request->company_id

            

            // $user->Userinfo()->attach(
            ]);

            

          if (is_null($userinfo) || empty($userinfo)) {                                                                                                                              
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            return $this->json_response("No clients found", null, 'fail', 200);
        }
        return $this->json_response("Clients fetched.", $userinfo, 'success', 200);



        
    }
}
