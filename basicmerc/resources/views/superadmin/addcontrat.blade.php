@php
use Illuminate\Support\Facades\DB;

$array = Lang::get('en/manage');
if(isset($_COOKIE['lg'])) {
    if($_COOKIE['lg']=='tr')
    {
    $array = Lang::get($_COOKIE['lg'].'/manage');
    }
    
}

$codes='';
$fins='';
$mercs='';
$sats='';
$infs='';

if(!is_null($id)){
$contracts = DB::table('contract')->where('id',$id)->get();
$contract = json_decode($contracts,true);
$codes=$contract[0]['code'];
$fins=$contract[0]['finish'];
$mercs=$contract[0]['merc_id'];
$sats=$contract[0]['start'];
$infs=$contract[0]['info'];





}


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

 @include("superadmin/header")<!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Contract</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="/wantcontract" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            <input  type="hidden" value="{{$id}}" name="statics">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <p class="form-control-static">New Contract</p>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Code</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="code" value="{{$codes}}" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Merchant Code</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$mercs}}" name="merccode" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Start</label></div>
                                                                <div class="col-12 col-md-9"><input class="form-control" name="start" value="{{$sats}}" type="date" min="2020-10-01" max="2020-12-20"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Finish</label></div>
                                                                <div class="col-12 col-md-9"><input name="finish" class="form-control" value="{{$fins}}" type="date" min="2020-10-01" ></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea style="resize:none;" name="desc"  id="textarea-input" rows="3" placeholder="asdasd"  class="form-control">{{$infs}}</textarea></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="filepdf" class="form-control-file"></div>
                                                                </div>
                                                       
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Save
                                                        </button>
                                                         </form>
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
