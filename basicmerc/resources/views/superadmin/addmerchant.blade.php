@php
use Illuminate\Support\Facades\DB;

$array = Lang::get('en/manage');
if(isset($_COOKIE['lg'])) {
    if($_COOKIE['lg']=='tr')
    {
    $array = Lang::get($_COOKIE['lg'].'/manage');
    }
    
}


$stname='';
$stvergi='';
$stweb='';
$stpho='';
$stpername='';
$stsur='';
$stepermail='';
$stperpho='';
$stdep='';
$stpos='';
$stfin='';


if(!is_null($id)){
$merchants = DB::table('merchant')->where('id',$id)->get();
$merchant = json_decode($merchants,true);
$stname=$merchant[0]['name'];
$stvergi=$merchant[0]['vergi_id'];
$stweb=$merchant[0]['websitesi'];
$stpho=$merchant[0]['phone'];
/*$stpername=$merchant[0]['person_name'];
$stsur=$merchant[0]['person_surname'];
$stepermail=$merchant[0]['person_email'];
$stperpho=$merchant[0]['person_gsm'];
$stdep=$merchant[0]['person_departman'];
$stpos=$merchant[0]['person_position'];
*/
}


@endphp
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S'aide MRM System</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('images/logo2.png')}}">
    <link rel="shortcut icon" href="{{ asset('images/logo2.png')}}">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{ asset('theme/th1/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

 @include("superadmin/header")

 <!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       
                                                       {{$array['general']['add']}} <strong>{{$array['general']['merchant']}}</strong>

                                                       <form action="/addmerchants" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                       <button type="submit" class="btn btn-success btn-sm pull-right">
                                                            <i class="fa fa-dot-circle-o"></i> {{$array['addmercha']['sav']}}
                                                        </button>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        
                                                            <input  type="hidden" value="{{$id}}" name="statics">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Code</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <p class="form-control-static">{{$array['manage']['new']}} {{$array['general']['merchant']}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['manage']['name']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stname}}" type="text" id="text-input" name="name" placeholder="{{$array['manage']['name']}}" class="form-control"></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Industry</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="types" id="select" class="form-control">
                                                                            <option value="1"> {{$array['typelist']['1']}}</option>
                                                                            <option value="2"> {{$array['typelist']['2']}}</option>
                                                                            <option value="3"> {{$array['typelist']['3']}}</option>
                                                                            <option value="4"> {{$array['typelist']['4']}}</option>
                                                                            <option value="5"> {{$array['typelist']['5']}}</option>
                                                                            <option value="6"> {{$array['typelist']['6']}}</option>
                                                                            <option value="7"> {{$array['typelist']['7']}}</option>
                                                                            <option value="8"> {{$array['typelist']['8']}}</option>
                                                                            <option value="9"> {{$array['typelist']['9']}}</option>
                                                                            <option value="10"> {{$array['typelist']['10']}}</option>
                                                                            <option value="11"> {{$array['typelist']['11']}}</option>
                                                                            <option value="12"> {{$array['typelist']['12']}}</option>
                                                                            <option value="13"> {{$array['typelist']['13']}}</option>
                                                                            <option value="14"> {{$array['typelist']['14']}}</option>
                                                                            <option value="15"> {{$array['typelist']['15']}}</option>
                                                                            <option value="16"> {{$array['typelist']['16']}}</option>
                                                                            <option value="17"> {{$array['typelist']['17']}}</option>
                                                                            <option value="18"> {{$array['typelist']['18']}}</option>
                                                                            <option value="19"> {{$array['typelist']['19']}}</option>
                                                                            <option value="20"> {{$array['typelist']['20']}}</option>
                                                                            <option value="21"> {{$array['typelist']['21']}}</option>
                                                                            <option value="22"> {{$array['typelist']['22']}}</option>
                                                                            <option value="23"> {{$array['typelist']['23']}}</option>
                                                                            <option value="24"> {{$array['typelist']['24']}}</option>
                                                                            <option value="25"> {{$array['typelist']['25']}}</option>
                                                                            <option value="26"> {{$array['typelist']['26']}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                             <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax Office</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stvergi}}" type="text" id="text-input" name="taxoffice" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax Number</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stvergi}}" type="text" id="text-input" name="vergi" placeholder="Text" class="form-control"></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="resize:none;" name="mercinfo" id="textarea-input" rows="3" placeholder="{{$array['addmercha']['info']}}" class="form-control"></textarea></div>
                                                            </div>
                                                           
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['web']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stweb}}" type="text" id="text-input" name="mercweb" placeholder="{{$array['addmercha']['web']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['pho']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stpho}}" type="text" id="text-input" name="mercphone" placeholder="{{$array['addmercha']['pho']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Adress</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="resize:none;" name="address" id="textarea-input" rows="3" placeholder="{{$array['addmercha']['info']}}" class="form-control"></textarea></div>
                                                            </div>

                                                             <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">{{$array['addmercha']['cit']}}</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="city" id="select" class="form-control">
                                                                            <option value="0">Please select</option>
                                                                            <option value="1">Option #1</option>
                                                                            <option value="2">Option #2</option>
                                                                            <option value="3">Option #3</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">{{$array['addmercha']['cou']}}</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="countryid" id="select" class="form-control">
                                                                            <option value="0">Turkey</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                               

                                                           <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Contract id</label></div>
                                                                     <div class="col-12 col-md-9"><input value="{{$stpername}}" type="text" id="text-input" name="contractidd" placeholder="{{$array['manage']['name']}}" class="form-control"></div>
                                                                </div>
                                                           
                                                                
                                                               
                                                       
                                                    </div>
                                                    
                                                </div>
                                               


</div>
<div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Contact İnfo</strong> 
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['manage']['name']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stpername}}" type="text" id="text-input" name="pername" placeholder="{{$array['manage']['name']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['sur']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stsur}}" type="text" id="text-input" name="persurname" placeholder="{{$array['addmercha']['sur']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email Address</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stepermail}}" type="text" id="text-input" name="peremail" placeholder="Email" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['pho']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stperpho}}" type="text" id="text-input" name="perpho" placeholder="{{$array['addmercha']['pho']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['dep']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stdep}}" type="text" id="text-input" name="depa" placeholder="{{$array['addmercha']['dep']}}" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['pos']}}</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stpos}}" type="text" id="text-input" name="posi" placeholder="{{$array['addmercha']['pos']}}" class="form-control"></div>
                                                            </div>
                                                    </div>
                                                </div>


                                                 <div class="card">
                                                    <div class="card-header">
                                                        <strong>Business Information</strong> 
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Finacial Institution</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stfin}}" type="text" id="text-input" name="finacial" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                    
                                                    <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bank Account</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stfin}}" type="text" id="text-input" name="bankacco" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bank Iban</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stfin}}" type="text" id="text-input" name="iban" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Business Group</label></div>
                                                                <div class="col-12 col-md-9"><input value="{{$stfin}}" type="text" id="text-input" name="group" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                    </div>
                                                    
                                                     </div>
                                                </div>
                                            </div>
                                             </form>
                                  </div>        <!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
                            <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>

                            <script src="{{ asset('vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
                            <script src="{{ asset('vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

                            <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
                            <script src="{{ asset('theme/th1/assets/js/main.js')}}"></script>
</body>
</html>
