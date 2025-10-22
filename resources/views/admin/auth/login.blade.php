@extends('admin.auth.app')
@section('title')
    <title>{{ __('Login') }}</title>
@endsection

@push('styles')
<style>
    /* Admin Login Custom Styles */
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }
    
    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }
    
    .login-wrapper > div {
        width: 100%;
        max-width: 450px;
    }
    
    .login-brand {
        text-align: center;
        margin-bottom: 30px;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .card-primary {
        border: none;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        overflow: hidden;
    }
    
    .card-primary .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 25px;
    }
    
    .card-primary .card-header h4 {
        color: white;
        font-weight: 600;
        margin: 0;
        font-size: 1.5rem;
    }
    
    .card-primary .card-body {
        padding: 35px;
        background: white;
    }
    
    .form-group label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 2px solid #e0e6ed;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }
    
    #adminLoginBtn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        padding: 14px;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }
    
    #adminLoginBtn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    .float-right a {
        color: #667eea;
        font-weight: 500;
        text-decoration: none;
    }
    
    .float-right a:hover {
        color: #764ba2;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
    <section class="section">
        <div class="container login-wrapper">
            <div class="col-md-12 col-lg-4">
                <div class="login-brand">
                    <a href="{{ route('home') }}" style="font-size: 36px; font-weight: 700; color: #8EC3D4; text-decoration: none; font-family: Arial, sans-serif; display: block;">
                        fluttIris
                    </a>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ __('Welcome to Admin Login') }}</h4>
                    </div>

                    <div class="card-body">
                        <form novalidate="" id="adminLoginForm" action="{{ route('admin.store-login') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>

                                <input id="email exampleInputEmail" type="email" class="form-control" name="email"
                                    tabindex="1" autofocus value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">{{ __('Password') }}</label>
                                    <div class="float-right">
                                        <a href="{{ route('admin.password.request') }}" class="text-small">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>
                                </div>
                                <input id="password exampleInputPassword" type="password" class="form-control"
                                        name="password" tabindex="2">
                            </div>

                            <div class="form-group">
                                <button id="adminLoginBtn" type="submit" class="btn btn-primary btn-lg btn-block"
                                    tabindex="4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
