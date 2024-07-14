<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
    <link rel="stylesheet" href="../../css/login.css">
    <title>Login</title>
</head>
<body>
<div class='box'>
    <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title'>
            <div class='i i-login' aria-label="Login Icon"></div>
            <h2>LOGIN</h2>
        </div>
        <div class='box-login'>
            <div class='fieldset-body' id='login_form'>
                <button onclick="openLoginInfo();" class='b b-form i i-more' title='More Information'></button>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <p class='field'>
                        <label for="email">E-MAIL</label>
                        {{-- <input type='email' id="email" name='email' value="{{ old('email') }}" required autofocus autocomplete="username" /> --}}
                        <input type='text' id="email" name='email' value="{{ old('email') }}" required autofocus autocomplete="username" />
                        <span id='valida' class='i i-warning'></span>
                    </p>
                    <!-- Password -->
                    <p class='field'>
                        <label for="password">PASSWORD</label>
                        <input type='password' id="password" name="password" required autocomplete="current-password" />
                        <span id='valida' class='i i-close'></span>
                    </p>
                    <!-- Remember Me -->
                    <label class='checkbox' for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember" /> Keep me Signed in
                    </label>
                    <!-- Submit Button -->
                    <input type='submit' id='do_login' value='GET STARTED' title='Get Started' />
                </form>
            </div>
        </div>
    </div>
    <div class='box-info'>
        <p>
            <button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button>
            <h3>Need Help?</h3>
        </p>
        <div class='line-wh'></div>
        <a class='b-support' title='Forgot Password?' href="{{ route('password.request') }}"> Forgot Password?</a>
        <div class='line-wh'></div>
        <a href="{{ route('register') }}" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</a>
    </div>
</div>
<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
<script src="../../js/login.js"></script>
</body>
</html>
