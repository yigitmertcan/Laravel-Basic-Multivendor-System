<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class setting extends Controller
{
    public function logincheck()
    {
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 2:
    			$girdi='admin/setting';
    			break;
    		case 1:
    			$girdi='superadmin/setting';
    			break;
    		case 3:
    			$girdi='user/setting';
    			break;
    		
    		
    	}
    	return view($girdi);
    }
    public function lang($tur=null)
    {
       if ($tur=='tr') {
          setcookie('lg', 'tr', time() + (86400 * 30), "/");
          header('Location: /');
          exit;
       }
       else{
            unset($_COOKIE['lg']); 
            setcookie('lg', null, -1, '/');
            header('Location: /');
            exit;
       }
    }
}
