<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --error-color: #ef233c;
            --dark-bg: #1a1a2e;
            --input-bg: #16213e;
            --text-light: #f8f9fa;
            --text-muted: #adb5bd;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: var(--dark-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-light);
            background-image:
                radial-gradient(circle at 25% 25%, rgba(67, 97, 238, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(239, 35, 60, 0.15) 0%, transparent 50%);
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            background: rgba(26, 26, 46, 0.9);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: var(--text-light);
            position: relative;
        }

        .login-box h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .user-box {
            position: relative;
            margin-bottom: 2rem;
        }

        .user-box input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            font-size: 1rem;
            color: var(--text-light);
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            outline: none;
            transition: var(--transition);
        }

        .user-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .user-box label {
            position: absolute;
            top: 15px;
            left: 45px;
            padding: 0 5px;
            font-size: 1rem;
            color: var(--text-muted);
            pointer-events: none;
            transition: var(--transition);
        }

        .user-box input:focus~label,
        .user-box input:valid~label {
            top: -10px;
            left: 35px;
            font-size: 0.8rem;
            background: var(--dark-bg);
            color: var(--primary-color);
        }

        .user-box::before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 15px;
            left: 15px;
            color: var(--text-muted);
            transition: var(--transition);
        }

        .user-box.email-field::before {
            content: "\f0e0";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--text-muted);
            transition: var(--transition);
            z-index: 2;
        }

        /* Password Icon */
        .user-box.password-field::before {
            content: "\f023";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--text-muted);
            transition: var(--transition);
            z-index: 2;
        }

        .user-box input:focus~ ::before,
        .user-box input:valid~ ::before {
            color: var(--primary-color);
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            overflow: hidden;
            position: relative;
        }

        .login-button:hover {
            background: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .login-button:active {
            transform: translateY(-1px);
        }

        .login-button::after {
            content: "";
            display: block;
            width: 30px;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            left: -40px;
            top: -50px;
            transform: rotate(25deg);
            transition: var(--transition);
        }

        .login-button:hover::after {
            left: 110%;
        }

        [style*="color: red"] {
            background: rgba(239, 35, 60, 0.2);
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--error-color);
            font-size: 0.9rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20%,
            60% {
                transform: translateX(-5px);
            }

            40%,
            80% {
                transform: translateX(5px);
            }
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 1.5rem;
                margin: 0 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div style="color: red;">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="user-box email-field">
                <input type="text" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box password-field">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit" class="login-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Login
            </button>
        </form>
    </div>
</body>

</html>