<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/css/sign/fonts/material-icon/css/material-design-iconic-font.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Agbalumo&family=Bruno+Ace+SC&family=Cairo:wght@300&display=swap');
    </style>
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/sign/style.css">
</head>

<body>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="width: 50%; text-align: center;margin: auto">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="main">




        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/sign/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Your Name"
                                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus />

                            </div>
                            @error('email')
                                <span style="color: rgb(145, 13, 13)">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="your_pass" placeholder="Password"
                                    class="@error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" />
                                @error('password')
                                    <span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('error')
                                    <span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember-me" class="agree-term"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>

                            <div class="form-group form-button">
                                <button class="bn30" type="submite">Sign In</button>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/js/sign/jquery/jquery.min.js"></script>
    <script src="assets/js/sign/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
