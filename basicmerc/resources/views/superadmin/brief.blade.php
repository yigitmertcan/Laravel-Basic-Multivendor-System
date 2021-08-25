@php
use Illuminate\Support\Facades\DB;

$array = Lang::get('en/manage');
if(isset($_COOKIE['lg'])) {
    if($_COOKIE['lg']=='tr')
    {
    $array = Lang::get($_COOKIE['lg'].'/manage');
    }
    
}



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



@endphp
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Master MRM System</title>
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
                                                           
                                                       <button type="submit" class="btn btn-success btn-sm pull-right">
                                                            <i class="fa fa-dot-circle-o"></i> {{$array['addmercha']['sav']}}
                                                        </button>
                                                    </div>
                                                    <div class="card-body card-block">
                                                         @csrf
                                                            <input  type="hidden" value="{{$id}}" name="statics">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Code</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <p class="form-control-static">Static</p>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['manage']['name']}}</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">{{$stname}}</p></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Industry</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <p class="form-control-static">Static</p>
                                                                    </div>
                                                                </div>
                                                             <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax Office</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax Number</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="resize:none;" name="mercinfo" id="textarea-input" rows="3" placeholder="{{$array['addmercha']['info']}}" class="form-control"></textarea></div>
                                                            </div>
                                                           
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['web']}}</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">{{$stweb}}</p></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$array['addmercha']['pho']}}</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">{{$stpho}}</p></div>
                                                            </div>

                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">{{$array['addmercha']['cou']}}</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <p class="form-control-static">Static</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">{{$array['addmercha']['cit']}}</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                       <p class="form-control-static">Static</p>
                                                                    </div>
                                                                </div>

                                                           <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Contract id</label></div>
                                                                     <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                                </div>
                                                           
                                                                
                                                          </form>     
                                                       
                                                    </div>
                                                    
                                                </div>
                                               


</div>
<div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Contact İnfo</strong> 
                                                        <button type="submit" type="button" onclick="location.href='#'" class="btn btn-outline-primary btn-sm pull-right">Add</button>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >Larry</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><button onclick="location.href='#'"  type="button" class="btn btn-outline-primary">Edit</button></td>
                                        </tr>
                                        <tr>
                                            <td>Larry</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td><button onclick="location.href='#'"  type="button" class="btn btn-outline-primary">Edit</button></td>
                                        </tr>
                                        <tr>
                                            <td>Larry</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td><button onclick="location.href='#'"  type="button" class="btn btn-outline-primary">Edit</button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                                    </div>
                                                </div>


                                                 <div class="card">
                                                    <div class="card-header">
                                                        <strong>Business Information</strong> 
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Finacial Institution</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>
                                                    
                                                    <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bank Account</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bank Iban</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Business Group</label></div>
                                                                <div class="col-12 col-md-9"><p class="form-control-static">Static</p></div>
                                                            </div>
                                                    </div>
                                                    
                                                     </div>
                                                </div>
                                            </div>
                                             
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
