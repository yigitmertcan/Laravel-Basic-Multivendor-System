<!doctype html>
@php
use Illuminate\Support\Facades\DB;
$array = Lang::get('en/manage');
if(isset($_COOKIE['lg'])) {
    if($_COOKIE['lg']=='tr')
    {
    $array = Lang::get($_COOKIE['lg'].'/manage');
    }
    
}


$merchants = DB::table('merchant')->get();
$admins = DB::table('users')->where('merc_id','>',1)->where('admin',true)->get();
$systemusers = DB::table('users')->where('merc_id',1)->where('admin',true)->get();
$superadmins = DB::table('users')->where('merc_id',0)->where('admin',true)->get();
$users = DB::table('users')->where('admin',false)->get();
$contracts = DB::table('contract')->get();



@endphp
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Master MRM System</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('images/logo2.png')}}">
    <link rel="shortcut icon" href="{{ asset('images/logo2.png')}}">


    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/th1/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

   @include("superadmin/header")<!-- /header -->
        <!-- Header-->

        

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{$array['general'][$tur]}}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            @if($tur=='merchant')
                                            <th>{{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['name']}}</th>
                                            <th>Type</th>
                                            <th>Contract {{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['delete']}}</th>
                                            <th></th>
                                            @elseif ($tur=='admin'||$tur=='superadmin'||$tur=='systemuser')
                                            <th>{{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['name']}}</th>
                                            <th>Email</th>
                                            <th>{{$array['general']['merchant']}} {{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['delete']}}</th>
                                            @elseif ($tur=='user')
                                            <th>{{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['name']}}</th>
                                            <th>Email</th>
                                            <th>{{$array['general']['merchant']}} {{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['delete']}}</th>
                                            @elseif ($tur=='contract')
                                            <th>{{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['name']}}</th>
                                            <th>Email</th>
                                            <th>{{$array['general']['merchant']}} {{$array['manage']['id']}}</th>
                                            <th>{{$array['manage']['delete']}}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($tur=='merchant')
                                         @foreach($merchants as $merchant)
                                           <tr>
                                            <td>{{ $merchant->id }}</td>
                                            <td>{{ $merchant->name }}</td>
                                            <td>{{ $merchant->type }}</td>
                                            <td>{{ $merchant->contract_serial_id }}</td>
                                            <td>{{ $merchant->delete }}</td>
                                            <td><button type="button" onclick="location.href='/addmerchant/{{ $merchant->id }}'" class="btn btn-success">Edit</button>&nbsp;<button onclick="location.href='/brief/{{ $merchant->id }}'"  type="button" class="btn btn-outline-primary">Brief</button>&nbsp;<button type="button" onclick="myclFunction({{ $merchant->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                            @elseif ($tur=='admin')
                                            @foreach($admins as $admin)
                                            <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><button type="button" onclick="location.href='/add/admin/{{ $admin->id }}'" class="btn btn-success">Edit</button><button type="button" onclick="myclFunction({{ $admin->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                         @elseif ($tur=='superadmin')
                                            @foreach($superadmins as $superadmin)
                                            <tr>
                                            <td>{{ $superadmin->id }}</td>
                                            <td>{{ $superadmin->name }}</td>
                                            <td>{{ $superadmin->email }}</td>
                                            <td><button type="button" onclick="location.href='/add/superadmin/{{ $superadmin->id }}'" class="btn btn-success">Edit</button><button type="button" onclick="myclFunction({{ $superadmin->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                         @elseif ($tur=='systemuser')
                                            @foreach($systemusers as $systemuser)
                                            <tr>
                                            <td>{{ $systemuser->id }}</td>
                                            <td>{{ $systemuser->name }}</td>
                                            <td>{{ $systemuser->email }}</td>
                                            <td><button type="button" onclick="location.href='/add/systemuser/{{ $systemuser->id }}'" class="btn btn-success">Edit</button><button type="button" onclick="myclFunction({{ $systemuser->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                        @elseif ($tur=='user')
                                            @foreach($users as $user)
                                            <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><button type="button" onclick="location.href='/add/user/{{ $user->id }}'" class="btn btn-success">Edit</button><button type="button" onclick="myclFunction({{ $user->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                        @elseif ($tur=='contract')
                                            @foreach($contracts as $contract)
                                            <tr>
                                            <td>{{ $contract->id }}</td>
                                            <td>{{ $contract->info }}</td>
                                            <td>{{ $contract->start }}</td>
                                            <td><button type="button" onclick="location.href='/addcontract/{{ $contract->id }}'" class="btn btn-success">Edit</button><button type="button" onclick="myclFunction({{ $contract->id }})" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                            @endif
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<script>
function myclFunction($var) {
  var r = confirm($var+"Hello a button!");
  if (r == true) {
    location.href='/delete/{{$tur}}/'+$var;
  } 
}
</script>
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('theme/th1/assets/js/main.js')}}"></script>


    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('theme/th1/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>


</body>

</html>
