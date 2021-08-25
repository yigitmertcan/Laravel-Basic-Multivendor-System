@php
$array = Lang::get('en/manage');
if(isset($_COOKIE['lg'])) {
    if($_COOKIE['lg']=='tr')
    {
    $array = Lang::get($_COOKIE['lg'].'/manage');
    }
    
}
@endphp
  <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/"><img src="{{ asset('images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/"> <i class="menu-icon fa fa-tachometer"></i>{{$array['general']['dash']}}</a>
                    </li>
                    <h3 class="menu-title">{{$array['general']['merchant']}} Works</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-hospital-o"></i>Contract</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Add Contract</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Manage Contract</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-plus"></i>{{$array['general']['addusers']}}</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-code-fork"></i><a href="/addmerchant">{{$array['general']['merchant']}}</a></li>
                            <li><i class="fa fa-lock"></i><a href="/add/admin">{{$array['general']['merchant']}} {{$array['general']['admin']}}</a></li>
                            <li><i class="fa fa-user"></i><a href="/add/user">{{$array['general']['merchant']}} {{$array['general']['user']}}</a></li>

                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>{{$array['general']['manage']}}</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-code-fork"></i><a href="/manage/merchant">{{$array['general']['merchant']}} </a></li>
                            <li><i class="fa fa-lock"></i><a href="/manage/admin">{{$array['general']['merchant']}} {{$array['general']['admin']}}</a></li>
                            <li><i class="fa fa-user"></i><a href="/manage/user">{{$array['general']['merchant']}} {{$array['general']['user']}}</a></li>
                            
                        </ul>
                    </li>
                   
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/close"><i class="fa fa-power-off"></i> {{$array['general']['logout']}}</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                              <a href="/lang/us">  <i class="flag-icon flag-icon-us"></i></a>
                            </div>
                            <div class="dropdown-item">
                              <a href="/lang/tr">  <i class="flag-icon flag-icon-tr"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>