<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class contractcon extends Controller
{
     public function logincheck($id=null)
    {
    	session_start();
    	$girdi='login';
    	switch (session()->get('sesadmin')) {
    		case 3:
    			$girdi='admin/manage';
    			break;
    		case 1:
    			$girdi='superadmin/addcontrat';
    			break;
    		case 4:
    			abort(404);
            case 2:
                $girdi='systemuser/addcontrat';
                break; 
    		
    		
    	}
    	return view($girdi)->with('id',$id);
    }

     public function add(Request $request)
   {
            $st= $request->statics;
            $code= $request->code;
            $merccode= $request->merccode;
            $start= $request->start;
            $finish= $request->finish;
            $desc = $request->desc;

           if (is_null($st)) {
                    DB::table('contract')->insert(
                ['code' => $code,'merc_id' =>$merccode,'start' => $start,'finish' => $finish ,'info' => $desc]);
            }
            else{
                    DB::table('contract')->where('id', $st)->update(['code' => $code,'merc_id' =>$merccode,'start' => $start,'finish' => $finish ,'info' => $desc]);
            }
            if ($_FILES["filepdf"]["name"]!='') {
                 $this->pdfekle('mert',"filepdf");
             } 
            
            
   }

        public function pdfekle($value,$value2)
    {
            $target_dir = "pdfo/";
            $target_file = $target_dir . basename($_FILES[$value2]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES[$value2]["tmp_name"]);
              if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
            }

            // Check file size
            if ($_FILES[$value2]["size"] > 300000000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "pdf"  ) {
              echo "Sorry, only PDF files are allowed.";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES[$value2]["tmp_name"], 'pdfo/'.$value.'.pdf')) {
                echo "The file ". htmlspecialchars( basename( $_FILES[$value2]["name"])). " has been uploaded.";
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
        
    }
}
