<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>Sign in / Sign up Form</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <!-- Форма для входа -->
           <form method="post" action="{{ route('login') }}" novalidate class="sign-in-form">
               @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" />
                </div>
                <input type="submit" value="Login" class="btn solid" />
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
               @if ($errors->any())
                   <div id="login-error-container" class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <p class="social-text">{{ $error }}</p>
                           @endforeach
                       </ul>
                   </div>
               @endif
            </form>

            <!-- Форма для регистрации -->
            <form method="post" action="{{ route('auth.signup') }}" novalidate class="sign-up-form">
                @csrf

                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" />
                </div>
                <input  type="submit" class="btn" value="Sign up" />
                @if ($errors->any())
                    <div id="signup-error-container" class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p class="social-text">{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>

    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, ex ratione. Aliquid!</p>
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="{{ asset('image/login.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam ad deleniti.</p>
                <button class="btn transparent" id="sign-in-btn">Sign in</button>
            </div>
            <img src="{{ asset('image/reg.svg') }}" class="image" alt="" />
        </div>
    </div>
</div>

</body>
</html>
