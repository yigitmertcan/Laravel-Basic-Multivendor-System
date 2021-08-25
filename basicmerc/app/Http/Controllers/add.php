<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class add extends Controller
{
   public function logincheck($tur,$id=null)
    {
    	if ($tur!='user'&&$tur!='admin'&&$tur!='superadmin'&&$tur!='systemuser') {
    		abort(404);
    	}
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 3:
    			abort(404);
    		case 1:
    			$girdi='superadmin/adduser';
    			break;
    		case 4:
    			abort(404);
            case 2:
                $girdi='systemuser/adduser';
                break;
    		
    		
    	}
    	return view($girdi)->with('tur',$tur)->with('id',$id);
    }

    public function add(Request $request,$tur)
    {	
    	session_start();
    	$static = $request->static;
    	$name = $request->username;
    	$email = $request->email;
    	$pass = $request->password;
    	$merc = $request->merchant;
    	

    	if ($tur!='user'&&$tur!='admin'&&$tur!='superadmin'&&$tur!='systemuser') {
    		abort(404);
    	}
    	if (session()->get('sesadmin')!=1&&$static!=$tur) {
    		abort(404);
    	}
	   	 
    	
    	switch ($tur) {
    		case 'user':
    			DB::table('users')->insert(
    	['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => false,'merc_id' => $merc]
    	);
    			break;
    		case 'admin':
    			DB::table('users')->insert(
    	['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => true,'merc_id' => $merc]
    	);
    			break;
                case 'systemuser':
                DB::table('users')->insert(
        ['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => true,'merc_id' => 1]
        );
                break;
    		case 'superadmin':
    			DB::table('users')->insert(
    	['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => true,'merc_id' => 0]
    	);
    			break;
    		
    	}

    	
    }

    public function delete($tur,$id)
    {
        session_start();
        if (session()->get('sesadmin')!=1) {
            abort(404);
        }
        echo $tur.'<br>'.$id;
       /* switch ($tur) {
            case 'user':
                DB::table('users')->insert(
        ['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => false,'merc_id' => $merc]
        );
                break;
            case 'admin':
                DB::table('users')->insert(
        ['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => true,'merc_id' => $merc]
        );
                break;
            case 'superadmin':
                DB::table('users')->insert(
        ['name' => $name,'delete'=>0,'email' => $email,'password' => $pass,'admin' => true,'merc_id' => 1]
        );
                break;
            
        }*/
    }
}
