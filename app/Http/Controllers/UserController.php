<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Session;
use Validator;
use Exception;
use DB;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function prosesregister(request $r){
        $validator = Validator::make($r->all(),[
            'nama' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'level' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8'
            ]);
        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('login');
        }
        else if($r->password != $r->password_confirmation){
            Session::flash('alert_warning','Password confirmation does not match');
            return redirect('login');
        }
        else{
                $email = DB::table('users')->where('email','like','%'.$r->email.'%')->count();
                if($email > 0){
                    Session::flash('alert_warning','Email has been registered, please use another email');
                    return redirect('login');
                }
                else{
                try{
                $create = UserModel::create([
                    'nama' => $r->nama,
                    'username' => $r->username,
                    'email' => $r->email,
                    'level' => $r->level,
                    'password' => md5($r->password)
                ]);
                Session::flash('alert_success','Register Success');
                return redirect('index');
                }
                catch(\Exception $e){
                    $message = $e->getMessage();
                    Session::flash('alert_warning',$message);
                    return redirect('login');
                }
                }
            }
            }
    public function proseslogin(request $r){
        $validator = Validator::make($r->all(),[
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);
        if($validator->fails()){
            Session::flash('alert_warning','Form uncompletely filled');
            return redirect('login');
        }
        else{
            try{
                $login = UserModel::where('username',$r->username)->where('password',md5($r->password));
                if($login->count() > 0){
                $data = $login->first();
                Session::put('id',$data->id);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('level',$data->level);
                Session::put('login_status',true);
                return redirect('index');
                }
                else{
                Session::flash('alert_warning','Wrong username or password');
                return redirect('login');
                }
            }
            catch(\Exception $e){
                $message = $e->getMessage();
                Session::flash('alert_warning',$message);
                return redirect('login');
            }
        }
    }
    public function logout(){
        Session::flush();
        return redirect('login');
    }
}


    

    

    
