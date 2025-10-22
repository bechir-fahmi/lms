@extends('frontend.layouts.master')
@section('meta_title', 'Login'. ' || ' . $setting->app_name)

@push('styles')
<style>
    /* Student/Teacher Login Custom Styles */
    .singUp-area {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        position: relative;
    }
    
    .singUp-area::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }
    
    .singUp-wrap {
        background: white;
        border-radius: 20px;
        padding: 45px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        position: relative;
        z-index: 1;
    }
    
    .singUp-wrap .title {
        color: #11998e;
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 2rem;
    }
    
    .singUp-wrap > p {
        color: #6c757d;
        margin-bottom: 25px;
        line-height: 1.6;
    }
    
    .account__social-btn {
        background: white;
        border: 2px solid #e0e6ed;
        border-radius: 10px;
        padding: 14px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }
    
    .account__social-btn:hover {
        border-color: #11998e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(17, 153, 142, 0.2);
    }
    
    .account__divider {
        margin: 25px 0;
    }
    
    .account__divider span {
        background: white;
        color: #6c757d;
        padding: 0 15px;
        font-weight: 500;
    }
    
    .form-grp label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
    }
    
    .form-grp input {
        border: 2px solid #e0e6ed;
        border-radius: 10px;
        padding: 14px 18px;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    
    .form-grp input:focus {
        border-color: #11998e;
        box-shadow: 0 0 0 0.2rem rgba(17, 153, 142, 0.15);
        outline: none;
    }
    
    .account__check-forgot a {
        color: #11998e;
        font-weight: 500;
        text-decoration: none;
    }
    
    .account__check-forgot a:hover {
        color: #38ef7d;
        text-decoration: underline;
    }
    
    .btn-two.arrow-btn {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        border: none;
        border-radius: 10px;
        padding: 15px 30px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(17, 153, 142, 0.3);
        margin-top: 10px;
    }
    
    .btn-two.arrow-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(17, 153, 142, 0.4);
    }
    
    .account__switch a {
        color: #11998e;
        font-weight: 600;
        text-decoration: none;
    }
    
    .account__switch a:hover {
        color: #38ef7d;
        text-decoration: underline;
    }
    
    .form-check-input:checked {
        background-color: #11998e;
        border-color: #11998e;
    }
</style>
@endpush

@section('contents')
    <!-- breadcrumb-area -->
    <x-frontend.breadcrumb
        :title="__('Login')"
        :links="[
            ['url' => route('home'), 'text' => __('Home')],
            ['url' => route('login'), 'text' => __('Login')],
        ]"
    />
    <!-- breadcrumb-area-end -->

    <!-- singUp-area -->
    <section class="singUp-area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title">{{ __('Welcome back!') }}</h2>
                        <p>{{ __('Hey there! Ready to log in? Just enter your email and password below and you will be back in action in no time. Lets go!') }}
                        </p>
                        @if($setting->google_login_status == 'active')
                        <div class="account__social">
                            <a href="{{ route('auth.social', 'google') }}" class="account__social-btn">
                                <img src="{{ asset('frontend/img/icons/google.svg') }}" alt="img">
                                {{ __('Continue with google') }}
                            </a>
                        </div>
                        <div class="account__divider">
                            <span>{{ __('or') }}</span>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('user-login') }}" class="account__form">
                            @csrf
                            <div class="form-grp">
                                <label for="email">{{ __('Email') }} <code>*</code></label>
                                <input id="email" type="text" placeholder="email" value="{{ old('email') }}" name="email">
                                <x-frontend.validation-error name="email" />
                            </div>
                            <div class="form-grp">
                                <label for="password">{{ __('Password') }} <code>*</code></label>
                                <input id="password" type="password" placeholder="password" name="password">
                            </div>
                            <div class="account__check">
                                <div class="account__check-remember">
                                    <input type="checkbox" class="form-check-input" name="remember" value=""
                                        id="terms-check">
                                    <label for="terms-check" class="form-check-label">{{ __('Remember me') }}</label>
                                </div>
                                <div class="account__check-forgot">
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                </div>
                            </div>
                            <!-- g-recaptcha -->
                            @if (Cache::get('setting')->recaptcha_status === 'active')
                            <div class="form-grp mt-3">
                                <div class="g-recaptcha" data-sitekey="{{ Cache::get('setting')->recaptcha_site_key }}"></div>
                                <x-frontend.validation-error name="g-recaptcha-response" />
                            </div>
                            @endif
                            <button type="submit" class="btn btn-two arrow-btn">{{ __('Sign In') }}<img
                                    src="{{ asset('frontend/img/icons/right_arrow.svg') }}" alt="img"
                                    class="injectable"></button>
                        </form>
                        <div class="account__switch">
                            <p>{{ __('Dont have an account?') }}<a href="{{ route('register') }}">{{ __('Sign Up') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->
@endsection
