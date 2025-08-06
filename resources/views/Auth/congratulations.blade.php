<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geokranti Registration Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2e7d32;
            --dark-green: #1b5e20;
            --light-green: #81c784;
            --earth-brown: #5d4037;
            --sky-blue: #0288d1;
            --gradient: linear-gradient(135deg, var(--primary-green) 0%, var(--sky-blue) 100%);
        }

        body {
            background: url('/logoimg.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        .congrats-container {
            max-width: 480px;
            width: 100%;
            margin: 2rem auto;
            padding: 1.5rem 2rem;
            border-radius: 20px;
            background: rgba(198, 198, 198, 0.578);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .congrats-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 1.5rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
        }

        .logo img {
            width: 100px;
            height: auto;
        }

        .brand-name {
            font-family: 'Poppins', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .congrats-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .congrats-header h1 {
            text-align: center;
            margin-bottom: 0.5rem;
            background: var(--gradient);
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.8rem;
            padding: 10px 0;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .check-icon {
            font-size: 5rem;
            color: var(--primary-green);
            margin: 1rem 0;
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-10px);
            }
        }

        .user-details {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .user-details p {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .user-details strong {
            color: var(--dark-green);
        }

        .btn-login {
            background: var(--gradient);
            color: white;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            margin-top: 1rem;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(46, 125, 50, 0.3);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .text-muted {
            color: #6b7280;
            margin-bottom: 1.2rem;
        }

        @media (max-width: 576px) {
            .congrats-container {
                padding: 1.5rem;
                margin: 1rem auto;
            }

            .logo {
                width: 60px;
                height: 60px;
            }

            .brand-name {
                font-size: 1.8rem;
            }

            .congrats-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="congrats-container">
            <div class="congrats-header">
                <div class="logo-container">
                    <div class="logo">
                        <img src="geokrantilogo-removebg.png" alt="Geokranti Logo">
                    </div>
                    <div class="brand-name">Geokranti</div>
                </div>
                <h1>Registration Successful!</h1>
            </div>

            <div class="check-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            
            <h3 class="mb-4">Congratulations, {{ $user->name }}!</h3>
            
            <div class="user-details">
                <h5>Your Account Details</h5>
                <p><strong>Your Email:</strong> {{ $user->email }}</p>
                <p><strong>Your Unique ID:</strong> {{ $user->ulid }}</p>
            </div>
            
            <p class="text-muted">You're now part of our community. Please keep your login details secure.</p>
            
            <a href="{{ route('auth.login') }}" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Proceed to Login
            </a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>