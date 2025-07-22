<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geokranti Login Page</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --secondary-color: #f43f5e;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
             --gradient: linear-gradient(135deg, #f43f5e 0%, #a855f7 50%, #6366f1 100%);
            --gradient-hover: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #f43f5e 100%);
        }
        
        body {
            background: url('images/bg-01.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: auto; /* Changed from hidden to auto */
            padding: 20px; /* Added padding */
        }
        
        .auth-container {
            max-width: 450px;
            width: 100%;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }
        
        .input-group-text{
            height: 50px;
        }
        /* Rest of your CSS remains the same */
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .auth-header h1 {
            text-align: center;
            margin-bottom: .5rem;
            background: var(--gradient);
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.8rem;
            padding: 10px 0;
            color: #fef9ff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
        }
        
        .btn-auth {
            background: var(--gradient);
            background-size: 200% 200%;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            border: none;
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-auth::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-hover);
            background-size: 200% 200%;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }
        
        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
            animation: gradientShift 3s ease infinite;
        }
        
        .btn-auth:hover::before {
            opacity: 1;
            animation: gradientShift 3s ease infinite;
        }
        
         .form-control::placeholder{
            color:black;
            opacity: 0.4;
        }
        
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        
        @media (max-width: 576px) {
            .auth-container {
                padding: 1.5rem;
                margin: 1rem auto;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
            
            .auth-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-header">
                <div class="logo">
                     <img src="geokrantilogo-removebg.png" alt="" width="120px" height="120px">
                </div>
                <h1>Welcome Back</h1>
                <p class="text-muted">Nice to see you again. Sign in to continue to your account</p>
            </div>

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope" style="color: #3699fc"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock" style="color: #3699fc"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-auth">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </button>
                
                <div class="text-center mt-4">
                    <p class="text-muted">Don't have an account? <a href="{{ route('auth.register') }}">Sign up</a></p>
                </div>
                <p class="text-center">You are going to choose a noble field</p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geokranti Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --secondary-color: #f43f5e;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --gradient: linear-gradient(135deg, #f43f5e 0%, #a855f7 50%, #6366f1 100%);
            --gradient-hover: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #f43f5e 100%);
        }

        body {
            background: url('images/bg-01.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: auto;
            /* Changed from hidden to auto */
            padding: 20px;
            /* Added padding */
        }

        .auth-container {
            max-width: 450px;
            width: 100%;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .input-group-text {
            height: 50px;
        }

        /* Rest of your CSS remains the same */
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header h1 {
            text-align: center;
            margin-bottom: .5rem;
            background: var(--gradient);
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.8rem;
            padding: 10px 0;
            color: #fef9ff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
        }

        .btn-auth {
            background: var(--gradient);
            background-size: 200% 200%;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            border: none;
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-auth::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-hover);
            background-size: 200% 200%;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
            animation: gradientShift 3s ease infinite;
        }

        .btn-auth:hover::before {
            opacity: 1;
            animation: gradientShift 3s ease infinite;
        }

        .form-control::placeholder {
            color: black;
            opacity: 0.4;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }


        @media (max-width: 576px) {
            .auth-container {
                padding: 1.5rem;
                margin: 1rem auto;
            }

            .logo {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .auth-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}


    <div class="container">
        <div class="auth-container">
            <div class="auth-header">
                <div class="logo">
                    <img src="geokrantilogo-removebg.png" alt="" width="120px" height="120px">
                </div>
                <h1>Welcome Back</h1>
                <p class="text-muted">Nice to see you again. Sign in to continue to your account</p>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope" style="color: #3699fc"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                </div>


                <div class="input-group position-relative">
                    <span class="input-group-text"><i class="fas fa-lock" style="color: #3699fc"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        required>
                    <i class="fas fa-eye toggle-password" toggle="#password"
                        style="position: absolute; right: 15px; top: 10px; cursor: pointer; color: #3699fc;"></i>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-auth">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </button>

                <div class="text-center mt-4">
                    <p class="text-muted">Don't have an account? <a href="{{ route('auth.register') }}">Sign up</a></p>
                </div>
                <p class="text-center">You are going to choose a noble field</p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(element) {
            element.addEventListener('click', function() {
                const input = document.querySelector(this.getAttribute('toggle'));
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    </script>

</body>

</html>