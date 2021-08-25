<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class firstlogin extends Controller
{
    public function logincheck()
    {
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 3:
    			$girdi='admin/dashboard';
    			break;
    		case 1:
    			$girdi='superadmin/dashboard';
    			break;
    		case 4:
    			$girdi='user/dashboard';
    			break;
            case 2:
                $girdi='systemuser/dashboard';
                break;
    		
    		
    	}
    	return view($girdi);
    }

    public function close()
    {
       session_start();
    session()->pull('sesid');
    session()->pull('sesadmin');
    session()->pull('sesmerch');
    echo    '<script>window.location=" /";</script>';
    }


    public function postRegister(Request $request)
    {
    	session_start();
    	$email = $request->email;
    	$pass = $request->password;
    	$catch = $request->catch;
    	$admindurum=4;
    /*	$users = DB::table('users')->where('email', $email)->get();
    	$userss = json_decode($users,true);

    	if($_SESSION['captcha']['code']==$catch&&$pass==$userss[0]['password']&&$email==$userss[0]['email']){
    		
    		if ($userss[0]['admin']==true &&$userss[0]['merc_id']==0) {
    			$admindurum=1;
    		}elseif ($userss[0]['admin']==true &&$userss[0]['merc_id']==1) {
    			$admindurum=2;
    		}
            elseif ($userss[0]['admin']==true &&$userss[0]['merc_id']!=1) {
                $admindurum=3;
            }*/
            
    		$request->session()->put('sesid','1');
    		$request->session()->put('sesadmin','1');
            $request->session()->put('sesmerch','1');
    	echo	'<script>window.location=" /";</script>';
				
				
    
    	/*else{
    		
    		header('Location: /');
				exit;
    	}*/
    }
}