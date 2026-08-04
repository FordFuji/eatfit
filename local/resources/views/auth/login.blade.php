@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="md-float-material">
                        
                         
                        
                        @csrf
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div> --}}
        <div class="col-sm-12">
        <div class="login-card card-block auth-body mr-auto ml-auto">
            <form class="md-float-material"  method="POST" action="{{ url('saveUpdatelogin') }}" class="md-float-material" >
                @csrf
                <div class="text-center">
                    <img src="{{asset('/files/frontend/images/logo.svg')}}" alt="logo.png" width="200px" height="100%">
                </div>
                <div class="auth-box bg-14">
                    {{-- <div class="text-center">
                        <img src="{{asset('/files/backend/assets/images/logo-footer.png')}}" alt="logo.png">
                    </div> --}}
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <h3 class="text-center txt-primary">Sign In</h3>
                        </div>
                    </div>
                    <hr/>
                    <div class="input-group">
                        <input id="email" type="email" placeholder="Your Email Address" class="form-control" name="email">
                        <span class="md-line"></span>
                    </div>
                    <div class="input-group">
                        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password">
                        <span class="md-line"></span>
                    </div>
                    
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            {{-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button> --}}
                            <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 bg-11" onclick="checkLogin();">
                                {{ __('Login') }}
                            </button>
                                <!-- <a class="nav-link text-right" href="{{ url('register') }}">{{ __('Register') }}</a> -->
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                    {{-- <hr/> --}}
                    {{-- <div class="row">
                        <div class="col-md-10">
                            <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                            <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                        </div>
                        <div class="col-md-2">
                            <img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                        </div>
                    </div> --}}
                    {{-- <ul class="navbar-nav ml-auto"> --}}
                        <!-- Authentication Links -->
                        {{-- @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest --}}
                    </ul>
                </div>
            </form>
            <!-- end of form -->
        </div>
    </div>
    </div>
</div>
<script>
    function checkLogin() {
        if($("#email").val() == '') {
            alert('Please Enter Email');

            $("#email").focus();
        }/* else if(!isEmail($("#email").val())) {
            alert('Invalid Email');

            $("#email").focus();
        }*/ else if($("#password").val() == '') {
            alert('Please Enter Password');

            $("#password").focus();
        } else {
            $.post('<?php echo url("saveUpdatelogin");?>', { email: $("#email").val(), password: $("#password").val(), "_token": "{{ csrf_token() }}" }, function(data) {
                if(data != 0) {
                    window.location.href = '<?php echo url("backend");?>';
                } else {
                    alert('Username or Password Incorrect');

                    $("#email").focus();
                    $("#email").val('');
                    $("#password").val('');
                }
            });
        }
    }

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
@endsection
