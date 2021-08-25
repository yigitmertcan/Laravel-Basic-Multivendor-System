<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class addmerchant extends Controller
{

  public function logincheck($id=null)
    {
      session_start();
      $girdi='login';
      switch (session()->get('sesadmin')) {
        case 3:
          abort(404);
        case 1:
          $girdi='superadmin/addmerchant';
          break;
        case 4:
          abort(404);
        case 2:
                $girdi='systemuser/addmerchant';
                break; 
        
        
      }
      return view($girdi)->with('id',$id);
    }


    public function logincheckbrief($id)
    {
      session_start();
      $girdi='login';
      switch (session()->get('sesadmin')) {
        case 3:
          abort(404);
        case 1:
          $girdi='superadmin/brief';
          break;
        case 4:
          abort(404);
        case 2:
                $girdi='systemuser/brief';
                break; 
        
        
      }
      return view($girdi)->with('id',$id);
    }


   public function add(Request $request)
   {
    
   	$st = $request->statics;
   	$name = $request->name;
   	$country = $request->countryid;
    $city = $request->city;
    $vergi = $request->vergi;
    $mercinfo = $request->mercinfo;
    $mercweb = $request->mercweb;
    $mercpho = $request->mercphone;
    $perna = $request->pername;
    $persurname = $request->persurname;
    $perema = $request->peremail ;
    $perpho = $request->perpho;
    $depa = $request->depa;
    $address = $request->address;
    $posi = $request->posi;
    $fin = $request->finacial;
    $types = $request->types;
    $bankacco= $request->bankacco;
    $iban= $request->iban;
    $group= $request->group;
    $contractidd= $request->contractidd;
    $taxoffice= $request->taxoffice;

    
    for ($i=0; $i < 5; $i++) { 
      $code=$this->generateRandomString();
      $merchants = DB::table('merchant')->where('code',$code)->get();
      $merchant = json_decode($merchants,true);
      if (!isset($merchant[0])) {
      break;
      }
    }
    
    if (is_null($st)) {
    	DB::table('merchant')->insert(
    ['name' => $name,'delete'=>0,'contract_serial_id' => $contractidd,'vergi_id' => $vergi,'info' => $mercinfo,'adress'=>$address,'websitesi' => $mercweb,'phone' => $mercpho,'type' => $types,'country'=>$country,'city'=>$city,'fin_inst'=>$fin,'bank_acco'=>$bankacco,'code'=>$code,'bank_iban'=>$iban,'bus_gro'=>$group,'tax_office'=>$taxoffice]
    );
      DB::table('contact')->insert(['person_name' => $perna,'person_surname' => $persurname,'person_email' => $perema,'person_gsm' => $perpho,'person_departman' => $depa,'code'=>$code,'person_position' => $posi]);
    }else{
    	DB::table('merchant')->where('id', $st)->update(['name' => $name,'contract_serial_id' => $contractidd,'vergi_id' => $vergi,'info' => $mercinfo,'websitesi' => $mercweb,'phone' => $mercpho,'type' => $types,'country'=>$country,'adress'=>$address,'city'=>$city,'fin_inst'=>$fin,'bank_acco'=>$bankacco,'bank_iban'=>$iban,'bus_gro'=>$group,'tax_office'=>$taxoffice]);
    }
   	
   }


   function generateRandomString() {
    $length = 10;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
}




