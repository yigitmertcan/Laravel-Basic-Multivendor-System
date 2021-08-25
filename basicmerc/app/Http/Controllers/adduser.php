<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class adduser extends Controller
{
   public function logincheck($tur,$id=null)
    {
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 3:
    			$girdi='admin/adduser';
    			break;
    		case 1:
                abort(404);
    		case 4:
    			abort(404);
            case 2:
                abort(404);
    		
    		
    	}
    	return view($girdi)->with('id',$id);
    }
}
