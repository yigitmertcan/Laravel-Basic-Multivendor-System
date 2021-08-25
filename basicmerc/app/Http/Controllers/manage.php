<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manage extends Controller
{
    public function logincheck($tur=null)
    {
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 3:
    			$girdi='admin/manage';
    			break;
    		case 1:
    			$girdi='superadmin/manage';
    			break;
    		case 4:
    			abort(404);
            case 2:
                $girdi='systemuser/manage';
                break; 
    		
    		
    	}
    	return view($girdi)->with('tur',$tur);
    }
}
