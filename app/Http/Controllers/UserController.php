<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;

use DB;
use Hash;
use Redirect;

class UserController extends Controller
{
    public function registration(){
        return view('registration');
    }

    public function registrationProcess(RegistrationRequest $request){

        $email = DB::table('users')->where('email',$request->input('email'))->get();

        if($email == '[]'){
            DB::table('users')->insert(
                [
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'lastname' => 'assets/img/Profile-PNG-Icon.png',
                    'email' => $request->input('email'),
                    'gender' => $request->input('gender'),
                    'password' => Hash::make($request->input('password')),
                    'created_at' => now(),
                ]
                );
              
            return Redirect::back()->with('message', 'You have successfully registered');
   
        }else{
            return Redirect::back()->withErrors('User already exist! please login');
        }


    }

    public function userhome(Request $request){

        $username = $request->session()->get('uname');

        $userdetails = DB::table('users')->where('email', $username)->get();
        $user = DB::table('users')->where('email', $username)->get();
        foreach($user as $user){

            $userid=$user->id;

        }
        $friends = DB::table('users')
                    ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status','friends.reciever')
                    ->rightJoin('friends', 'users.id', '=', 'friends.sender')
                    ->where('users.email', '!=', $username)
                    ->where('friends.status','=',1)
                    ->where('friends.reciever','=',$userid)
                    ->orwhere('friends.sender','=',$userid)
                    ->where('users.email', '!=', $username)
                    ->where('friends.status','=',1)
                    
                    ->get();
        $Fsuggession = DB::table('users')
                        ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status','friends.reciever')
                        ->rightJoin('friends', 'users.id', '=', 'friends.sender')
                        ->where('users.email', '!=', $username)
                        ->where('friends.status','=',0)
                        ->get();


        $Frequest = DB::table('users')
                    ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status')
                    ->rightJoin('friends', 'users.id', '=', 'friends.reciever')
                    ->where('friends.status','=',0)
                    ->where('friends.reciever','=',$userid)
                    ->get();

        // print_r($friends);
     
         return view('userprofile/home')->with('userdetails',$userdetails)->with('Fsuggession',$Fsuggession)->with('friends',$friends);
    }

    public function loginprocess(LoginRequest $request){

        $username = $request->input('email');
        $password =$request->input('password');
      

        $users = DB::table('users')->where('email', $username)->get();

        if ($users == "[]"){

            return Redirect::back()->withErrors('Login Failed');
        }else{

            // echo $users;

            $request->session()->put('uname', $username);

        foreach($users as $users){
       
           if(Hash::check($password, $users->password)) {

            // echo "Success login";

             return redirect('/userhome');
           
            } else {
               return Redirect::back()->withErrors('Login Failed');
            }
          }   
    }

    }

    public function sendrequest(Request $request, $id){

        $username = $request->session()->get('uname');

        $user = DB::table('users')->where('email', $username)->get();

        foreach($user as $user){

            $userid=$user->id;

        }

        DB::table('friends')->insert(
            [
                'sender' => $userid,
                'reciever' => $id,
                'status' => 0,
                'created_at' => now(),
            ]
            );

            return redirect('/userhome');

    }


    public function acceptRequest($sid,$rid){

        DB::table('friends')
              ->where('reciever', $rid)
              ->where('sender', $sid)
              ->update(['status' => 1]);

              return redirect('/userhome');

    }

    public function logout(){

        $request->session()->forget('uname');
        return redirect('/');

    }


    public function changeimage(Request $request){

        $username = $request->session()->get('uname');

        $userdetails = DB::table('users')->where('email', $username)->get();
        $user = DB::table('users')->where('email', $username)->get();
        foreach($user as $user){

            $userid=$user->id;

        }
        $friends = DB::table('users')
                    ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status','friends.reciever')
                    ->rightJoin('friends', 'users.id', '=', 'friends.sender')
                    ->where('users.email', '!=', $username)
                    ->where('friends.status','=',1)
                    ->where('friends.reciever','=',$userid)
                    ->orwhere('friends.sender','=',$userid)
                    ->where('users.email', '!=', $username)
                    ->where('friends.status','=',1)
                    
                    ->get();
        $Fsuggession = DB::table('users')
                        ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status','friends.reciever')
                        ->rightJoin('friends', 'users.id', '=', 'friends.sender')
                        ->where('users.email', '!=', $username)
                        ->where('friends.status','=',0)
                        ->get();


        $Frequest = DB::table('users')
                    ->select('users.id','users.email','users.firstname','users.lastname','users.profilepic','friends.status')
                    ->rightJoin('friends', 'users.id', '=', 'friends.reciever')
                    ->where('friends.status','=',0)
                    ->where('friends.reciever','=',$userid)
                    ->get();

        // print_r($friends);
     
         return view('userprofile/changeimage')->with('userdetails',$userdetails)->with('Fsuggession',$Fsuggession)->with('friends',$friends);
    }

    public function updateimage(Request $request){

        $username = $request->session()->get('uname');
        $file     = request()->file('image');
        $fileName = $file->getClientOriginalName();
        $destinationPath = 'assets/img/';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('users')
              ->where('email',$username)
              ->update(['profilepic' => $destinationPath.$fileName]);

              return redirect('/userhome');
            DB::table('sliders')->insert([
                ['slider' => $request->input('slider'), 'heading' => $request->input('heading'), 'description' => $request->input('description'), 'image' => $destinationPath.$fileName, 'created_at' => now()],
            ]);
    }
}
