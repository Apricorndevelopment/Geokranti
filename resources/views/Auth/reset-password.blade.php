
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geokranti Reset Password</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .reset-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .reset-container h4 {
            margin-bottom: 25px;
            color: #0072ff;
            font-weight: bold;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #0072ff;
            box-shadow: 0 0 5px rgba(0, 114, 255, 0.5);
        }

        .btn-submit {
            background: #0072ff;
            color: #fff;
            border-radius: 30px;
            padding: 12px 25px;
            border: none;
            transition: 0.3s;
            width: 100%;
        }

        .btn-submit:hover {
            background: #005ecb;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

</head>

<body>

    <div class="reset-container">
        <div class="logo">
            <img src="geokrantilogo-removebg.png" alt="Geokranti Logo">
        </div>
        <h4>Reset Password</h4>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3">
                <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="New Password" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                    required>
            </div>

            <button type="submit" class="btn btn-submit">
                <i class="fas fa-key me-2"></i> Reset Password
            </button>
        </form>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
