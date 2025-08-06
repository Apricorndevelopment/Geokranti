<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geokranti Register Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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

        .auth-container {
            max-width: 500px;
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
        }

        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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

        .auth-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .auth-header h1 {
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

        .text-muted {
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
        }

        .input-group-text {
            height: 50px;
            background-color: rgba(255, 255, 255, 0.611);
            border-right: none;
            color: var(--primary-green);
        }

        .input-group .form-control {
            background-color: rgba(255, 255, 255, 0.611);
            border-left: none;
        }

        .btn-auth {
            background: var(--gradient);
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(46, 125, 50, 0.3);
        }

        .btn-auth:active {
            transform: translateY(0);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
            color: var(--primary-green);
            z-index: 5;
        }

        .form-check-input:checked {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        a {
            color: var(--primary-green);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
        }

        .privacy-policy {
            margin: 1.5rem 0;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            border-left: 3px solid var(--primary-green);
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }

            .auth-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .text-muted {
                font-size: 12px;
                line-height: 0.5;
            }

            .logo {
                width: 60px;
                height: 60px;
            }

            .brand-name {
                font-size: 1.8rem;
            }

            .auth-header h1 {
                font-size: 1.5rem;
            }

            .btn-auth {
                padding: 10px;
                margin-top: 0;
            }

            .privacy-policy {
                margin: 1rem 0;
                padding: 12px;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-header">
                <div class="logo-container">
                    <div class="logo">
                        <img src="geokrantilogo-removebg.png" alt="Geokranti Logo">
                    </div>
                    <div class="brand-name">Geokranti</div>
                </div>
                <h1>Create Account</h1>
                <p class="text-muted">Join us today. Fill in your details to get started.</p>
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

            <form action="{{ route('register') }}" method="POST" id="registrationForm">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control"
                            placeholder="Full Name" required>
                    </div>
                    @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                        <input type="text" name="sponsor_id" value="{{ old('sponsor_id') }}" id="sponsor_id"
                            class="form-control" placeholder="Sponsor ID" required>
                    </div>
                    @error('sponsor_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small id="sponsor-message" class="text-muted"></small>
                </div>

                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                        <input type="text" name="parent_id" value="{{ old('parent_id') }}" id="parent_id"
                            class="form-control" placeholder="Parent ID (optional)">
                    </div>
                    @error('parent_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small id="parent-message" class="text-muted"></small>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" id="email"
                            class="form-control" placeholder="Email Address" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small id="email-message" class="text-muted"></small>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                            placeholder="Phone Number" required>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password" required>
                    </div>
                    <i class="fas fa-eye toggle-password" toggle="#password"></i>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="password-requirements mt-2">
                        <small class="text-muted">Password must contain: at least 8 characters, 1 letter, 1 number, 1
                            special character (@$!%*#?&) </small>
                    </div>
                </div>

                <div class="mb-3 position-relative">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <i class="fas fa-eye toggle-password" toggle="#password_confirmation"></i>
                </div>

                <div class="privacy-policy mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy_policy" name="privacy_policy"
                            required>
                        <label class="form-check-label" for="privacy_policy">
                            I agree to the Privacy Policy and Terms of Service
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-auth">
                    <i class="fas fa-user-plus me-2"></i> Register
                </button>

                <div class="text-center mt-4">
                    <p class="text-muted">Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
                </div>
                <p class="text-center text-muted">आओ साथ मिलकर प्राकृतिक खेती से जूडें ।</p>
            </form>
        </div>



        <div id="oldProfile">
            <!-- =============================================================== -->
            <form action="index.html" method="post" id="oldList">
                <h1>Login to Your Profile </h1>
                <h1></h1>
                <!-- USER NAME -->
                <div class="float-label">
                    <input type="text" name="" value="" placeholder="Username" id="oldName">
                </div>
                <br>

                <!-- PASSWORD -->
                <div class="float-label">
                    <input type="text" name="" value="" placeholder="Password" id="oldPwd">
                </div>

                <button type="button" name="button" id="sendData2">Login</button>
                <p></p>

                <!-- Create profile for unregistered users -->
                <p class="message"> Not registered? <button type="button" name="button"
                        id="create">&nbsp;Create an
                        account</button> </p>

            </form>
        </div>

        <!-- Display User Profile  -->
        <!-- =============================================================== -->
        <div id="updateProfile" class="row">

            <!-- Update Name -->
            <div class="col-md-4 user-left">
                <span><img src="https://github.com/rjoyce6/HW12-Profile/blob/master/img/girl.jpg?raw=true"
                        alt="user image" class="user-image" id="updateImage"></span>
                <h1 id="updateName"></h1>
                <p id="updateAge"></p>
            </div>

            <!-- Update Other information -->
            <div class="col-md-8 user-right">
                <h2>Profile <span>Info</span></h2>
                <div class="user-info">
                    <table>
                        <tr>
                            <td>
                                <p>email address : </p>
                            </td>
                            <td>
                                <p id="updateEmail"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>gender :</p>
                            </td>
                            <td>
                                <p id="updateGender"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>birthday: </p>
                            </td>
                            <td>
                                <p id="updateBirth"></p>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
            <br>
            <button type="button" name="button" id="signOut">&nbsp;Sign out</button> </p>

        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#sendOtpBtn').on('click', function() {
            let email = $('#email').val();

            if (!email) {
                alert('Please enter an email address first.');
                return;
            }

            $.ajax({
                url: "{{ route('send.email.otp') }}",
                type: "POST",
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    if (res.status) {
                        $('#otpSection').show();
                        $('#otpStatus').text(res.message);
                    }
                },
                error: function(err) {
                    alert('Failed to send OTP. Please check email format or try again.');
                }
            });
        });
    </script>


    {{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- for eye icon --}}
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

        // Email availability check
        $('#email').on('blur', function() {
            const email = $(this).val();
            if (email) {
                $.ajax({
                    url: '/check-email',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email
                    },
                    success: function(response) {
                        if (response.exists) {
                            $('#email-message').html(
                                '<span class="text-danger"><i class="fas fa-times-circle"></i> This email is already registered. Please enter another email</span>'
                                );
                        } else {
                            $('#email-message').html(
                                '<span class="text-success"><i class="fas fa-check-circle"></i> Email available</span>'
                                );
                        }
                    }
                });
            }
        });
    </script>


    <script>
        $('#sponsor_id').on('input', function() {
            let sponsorId = $(this).val();
            let statusIcon = $('#sponsor-status');
            let statusMessage = $('#sponsor-message');

            if (sponsorId.length === 0) {
                statusIcon.html('');
                statusMessage.text('');
                return;
            }

            $.ajax({
                url: '/check-sponsor/' + sponsorId,
                type: 'GET',
                success: function(response) {
                    if (response.exists) {
                        statusIcon.html('<i class="fas fa-check-circle text-success"></i>');
                        statusMessage.html(
                            `<span style="color: green;">Sponsor available: <strong>${response.name}</strong></span>`
                        );
                    } else {
                        statusIcon.html('<i class="fas fa-times-circle text-danger"></i>');
                        statusMessage.text('No sponsor found').css('color', 'red');
                    }
                },
                error: function() {
                    statusIcon.html('');
                    statusMessage.text('Error checking sponsor.').css('color', 'red');
                }
            });
        });

        $('#parent_id').on('input', function() {
            let parentId = $(this).val();
            let statusIcon = $('#parent-status');
            let statusMessage = $('#parent-message');

            if (parentId.length === 0) {
                statusIcon.html('');
                statusMessage.text('');
                return;
            }

            $.ajax({
                url: '/check-parent/' + parentId,
                type: 'GET',
                success: function(response) {
                    if (response.exists) {
                        statusIcon.html('<i class="fas fa-check-circle text-success"></i>');
                        statusMessage.html(
                            `<span style="color: green;">parent available: <strong>${response.name}</strong></span>`
                        );
                    } else {
                        statusIcon.html('<i class="fas fa-times-circle text-danger"></i>');
                        statusMessage.text('No parent found').css('color', 'red');
                    }
                },
                error: function() {
                    statusIcon.html('');
                    statusMessage.text('Error checking parent.').css('color', 'red');
                }
            });
        });
    </script>


    <script>
        // hide profile form
        document.getElementById('oldProfile').style.display = "none";
        document.getElementById('updateProfile').style.display = "none";

        //======================================================
        var count = 1;
        var users = [{
            name: "samara",
            password: "april",
            email: "samara.april@coderjoyce.com",
            gender: "Female",
            month: "1",
            day: "1",
            year: "2000",
            age: getUserAge(1, 1, 2000).toString(),
            image: "https://github.com/rjoyce6/HW12-Profile/blob/master/img/girl.jpg?raw=true"
        }];

        var user = {};


        // function to get users data
        function getUserData() {
            var results = document.getElementById('results');

            // store values
            var userName = document.getElementById('userName').value;
            var userPassword = document.getElementById('userPassword').value;
            var userEmail = document.getElementById('userEmail').value;

            // store elements by class for radios and select
            var userGenderEls = document.getElementsByClassName("userGender");
            var userMonthEls = document.getElementsByClassName("userMonth");
            var userDayEls = document.getElementsByClassName("userDay");
            var userYearEls = document.getElementsByClassName("userYear");


            // create variables to store gender and age
            var userGender, userMonth, userDay, userYear;


            // ---  FIRST NAME  ---
            // check if the username input is empty
            if (userName == "") {
                // send an alert if user name is empty
                alert("you forgot to type your name");

                // stop function if no answer
                return;
            }

            // ---  PASSWORD  ---
            // check if the username input is empty
            if (userPassword == "") {
                // send an alert if user password is empty
                alert("you forgot to type your password");

                // stop function if no answer
                return;
            }

            // ---  EMAIL  ---
            if (userEmail == "") {
                // send an alert if user email address is empty
                alert("you forgot to add your email");

                // stop function if no answer
                return;
            }

            if (validateEmail(userEmail) == false) {
                // send an alert if user email address is empty
                alert("please enter a valid email address");

                // stop function if no answer
                return;

            }

            // ---  GENDER  ---
            // loop through all elements with class="userGender"
            for (var i = 0; i < userGenderEls.length; i++) {
                // if the radio was selected by the user, do this
                if (userGenderEls[i].checked) {
                    // set value of answer to the value in the radio item
                    userGender = userGenderEls[i].value;
                };
            };

            // ---  MONTH  ---
            //loop through all elements with className = 'userMonth'
            for (var i = 0; i < userMonthEls.length; i++) {
                // check which was selected by the user, do this
                if (userMonthEls[i].selected) {
                    // set value of answer 2 to the value in the selected item
                    userMonth = userMonthEls[i].value;
                }
            }
            console.log(userMonth);
            if (userMonth == "") {
                // send an alert if user birthday month  is empty
                alert("you forgot to add a month for your birth date");

                // stop function if no answer
                return;
            }


            // ---  DAY  ---
            //loop through all elements with className = 'userDay'
            for (var i = 0; i < userDayEls.length; i++) {
                // check which was selected by the user, do this
                if (userDayEls[i].selected) {
                    // set value of answer 2 to the value in the selected item
                    userDay = userDayEls[i].value;
                }
            }
            if (userDay == "") {
                // send an alert if user birthday month  is empty
                alert("you forgot to add a day for your birth date");

                // stop function if no answer
                return;
            } else if (userDay == 31 && (userMonth == 4 || userMonth == 6 || userMonth == 9 || userMonth == 11)) {
                alert("please enter a valid date");

                // stop function if no answer
                return;
            }

            // ---  YEAR  ---
            //loop through all elements with className = 'userYear'
            for (var i = 0; i < userYearEls.length; i++) {
                // check which was selected by the user, do this
                if (userYearEls[i].selected) {
                    // set value of answer 2 to the value in the selected item
                    userYear = userYearEls[i].value;
                }
            }

            if (userMonth == 2) {
                console.log(userYear);
                if (userYear % 4 != 0 && userDay >= 29) {
                    alert("please enter a valid date");

                    // stop function if no answer
                    return;
                } else if (userDay > 29) {
                    alert("please enter a valid date");

                    // stop function if no answer
                    return;
                }
            }

            // if everything passes add a class of success to results
            // calculate user age
            var userAge = getUserAge(userMonth, userDay, userYear).toString();

            // create object for user profile data
            var userProfile = {
                name: userName,
                password: userPassword,
                email: userEmail,
                gender: userGender,
                month: userMonth,
                day: userDay,
                year: userYear,
                age: userAge,
                image: "http://lorempixel.com/400/400/people/"
            };

            //create a list of registered users
            users.push(userProfile)

            // confirm existance of all user profile data
            console.log(userProfile);

            // run displayProfile after 1 second passing in new profile data to be displayed
            setTimeout(function() {
                displayProfile(userProfile);
            }, 1000);
        };

        // Display login profile and hide the other forms
        // ===========================================================================
        function login() {
            //Delete existing content
            document.getElementById('oldName').value = "";
            document.getElementById('oldPwd').value = "";

            // hide profile form
            document.getElementById('newProfile').style.display = "none";
            document.getElementById('updateProfile').style.display = "none";


            // display sign in form
            document.getElementById('oldProfile').style.display = "block";
        };


        // Display create profile and hide the other forms
        // ===========================================================================
        function create() {
            //Delete existing content by id
            document.getElementById('userName').value = "";
            document.getElementById('userPassword').value = "";
            document.getElementById('userEmail').value = "";

            //Delete existing content by class




            // hide sign in form
            document.getElementById('oldProfile').style.display = "none";
            document.getElementById('updateProfile').style.display = "none";

            // display profile form
            document.getElementById('newProfile').style.display = "block";
        };

        // Sign in to display user profile
        // ===========================================================================
        function loginUser() {
            // Delete previous content
            var oldName = document.getElementById('oldName').value;
            var oldPsd = document.getElementById('oldPwd').value;

            console.log(users);

            // Check prevous user list
            for (var i = 0; i < users.length; i++) {
                // If the user name and user password is not empty, do this
                if ((oldName && oldPsd) != "") {
                    // If the a user name was found
                    if ((oldName === users[i].name) && (oldPsd === users[i].password)) {

                        console.log('user name: ' + users[i].name);

                        var user = users[i];



                        // display profile
                        setTimeout(function() {
                            // display to console users array
                            console.log('users[i] : ');
                            console.log(user);

                            // accessProfile(users[i]);
                            displayProfile(user);
                        }, 1000);
                    }
                }

            }
        }

        // Add click function to element with id="sendData", "login", and "create",
        //"signOut"
        //============================================================================
        document.getElementById('login').addEventListener('click', login, false);
        document.getElementById('create').addEventListener('click', create, false);
        document.getElementById('sendData').addEventListener('click', getUserData, false);
        document.getElementById('sendData2').addEventListener('click', loginUser, false);
        document.getElementById('signOut').addEventListener('click', create, false);


        // Display user profile after creating it
        // ===========================================================================
        function displayProfile(userProfile) {
            // hide profile form
            document.getElementById('newProfile').style.display = "none";
            document.getElementById('oldProfile').style.display = "none";

            // display profile form
            document.getElementById('updateProfile').style.display = "block";

            // select HTML elements by id
            var userName = document.getElementById('updateName');
            var userAge = document.getElementById('updateAge');
            var userEmail = document.getElementById('updateEmail');
            var userGender = document.getElementById('updateGender');
            var userBirth = document.getElementById('updateBirth');
            var userImage = document.getElementById('updateImage');

            // update profile using the userProfile object
            userName.innerText = userProfile.name;
            userImage.src = userProfile.image;
            userAge.innerText = userProfile.age + " years old";
            userEmail.innerText = userProfile.email;
            userGender.innerText = userProfile.gender;
            userBirth.innerText = months[userProfile.month].name + " " + userProfile.day + ", " + userProfile.year;

            // increment count
            count++;
        }


        // Display user profile after signing in
        // ===========================================================================
        function accessProfile(userProfile) {
            // hide profile form
            document.getElementById('newProfile').style.display = "none";
            document.getElementById('oldProfile').style.display = "none";

            // display profile form
            document.getElementById('updateProfile').style.display = "block";
        }



        // Update birth Date
        // ===========================================================================
        // create the number of days in a month
        var days = [];
        for (var i = 1; i <= 31; i++) {
            days.push(i);
        }

        // create months
        var months = [{
                id: 1,
                name: "January"
            },
            {
                id: 2,
                name: "February"
            },
            {
                id: 3,
                name: "March"
            },
            {
                id: 4,
                name: "April"
            },
            {
                id: 5,
                name: "May"
            },
            {
                id: 6,
                name: "June"
            },
            {
                id: 7,
                name: "July"
            },
            {
                id: 8,
                name: "August"
            },
            {
                id: 9,
                name: "September"
            },
            {
                id: 10,
                name: "October"
            },
            {
                id: 11,
                name: "November"
            },
            {
                id: 12,
                name: "December"
            }
        ];

        // create years
        var years = [];
        var date = new Date();
        // to create an account on this website you have to be at least 13
        // assumes that users could live up 100 years
        for (var i = (date.getFullYear() - 13); i > (date.getFullYear() - 100); i--) {
            years.push(i)
        }


        function birthdayInfo() {

            // MONTH
            for (var i = 0; i < months.length; i++) {
                // create an option and add text
                var option = document.createElement('option');
                var monthText = document.createTextNode(months[i].name);
                option.appendChild(monthText);

                // add option and assign a value of each option
                var addHere = document.getElementById('month');
                addHere.appendChild(option);
                option.value = months[i].id;
                option.className = 'userMonth';
            }

            //  DAYS
            createOptions(days, "day", "userDay");

            // YEARS
            createOptions(years, "year", "userYear");

        }

        function createOptions(numberArray, idName, className) {

            for (var i = 0; i < numberArray.length; i++) {
                // create an option and add text
                var option = document.createElement('option');
                var number = document.createTextNode(numberArray[i]);
                option.appendChild(number);

                // create an option and add text
                var addHere = document.getElementById(idName);
                addHere.appendChild(option);
                option.value = numberArray[i];
                option.className = className;
            }
        }

        birthdayInfo();


        // calculate birthday
        // ===========================================================================

        function getUserAge(month, day, year) {
            // get today's date
            var today = new Date();
            var nowyear = today.getFullYear();
            var nowmonth = today.getMonth();
            var nowday = today.getDate();

            // Find the difference between today's day vs user bith date
            var age = nowyear - year;
            var ageMonth = nowmonth - month;
            var ageDay = nowday - day;

            if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
                age = age - 1;
            }

            if (count != 1) {
                console.log("user age: " + age);
            }
            return age;
        }



        // Validate email
        // ===========================================================================
        function validateEmail(email) {
            var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            console.log(regEx.test(email));
            return regEx.test(email);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
