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
$stemail='';

if(!is_null($id)){
$users = DB::table('users')->where('id',$id)->get();
$user = json_decode($users,true);
$stname=$user[0]['name'];
$stemail=$user[0]['email'];

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

    <link rel="apple-touch-icon" href="{{ asset('images/logo2.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}">

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

 @include("systemuser/header")<!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">{{$array['general']['add']}} {{$array['general'][$tur]}}</div>
                                    <div class="card-body card-block">
                                        <form action="/wantadduser/{{$tur}}" method="post" class="">
                                            @csrf
                                            <input  type="hidden" value="{{$tur}}" name="static">
                                            <input  type="hidden" value="{{$id}}" name="statics">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Select User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="merchant" id="select" class="form-control">
                                                        <option value="0">New User</option>
                                                       
                                                        <option value="3"> gfdgfdg</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input value="{{$stname}}" type="text" id="username" name="username" placeholder="{{$array['adduser']['usern']}}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input value="{{$stemail}}" type="email" id="email" name="email" placeholder="Email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="{{$array['adduser']['pass']}}" class="form-control">
                                                </div>
                                                <small class="form-text text-muted">{{$array['adduser']['acikla']}}</small>
                                            </div>
                                           
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm">{{$array['adduser']['sum']}}</button>
                                            </div>
                                        </form>
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
