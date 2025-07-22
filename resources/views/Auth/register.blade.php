
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
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --gradient: linear-gradient(135deg, #f43f5e 0%, #a855f7 50%, #6366f1 100%);
        }

        body {
            background: url('images/bg-01.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px;
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

        .box-main {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        #header {
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

        .input-group {
            margin-bottom: 1rem;
        }

        .input-group-text {
            background-color: #fff;
            border-right: none;
            border-radius: 12px 0 0 12px !important;
        }

        .form-control {
            padding: 10px;
            border-radius: 0 12px 12px 0 !important;
            border-left: none;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #e2e8f0;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        #sendData {
            background: var(--gradient);
            color: #fef9ff;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.3rem;
            margin-top: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        #sendData:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .message {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .message a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .message a:hover {
            text-decoration: underline;
        }

        .privacy-policy {
            margin: 1.5rem 0;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            border-left: 3px solid var(--primary-color);
        }

        .radio-inline {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .radio-inline span {
            color: #333;
        }

        .option-input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .form-control::placeholder {
            color: black;
            opacity: 0.4;
        }

        @media (max-width: 576px) {
            .box-main {
                padding: 1.5rem;
            }

            #header {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="box-main">
        <form action="{{ route('register') }}" method="POST" id="newProfile">
            @csrf
            <div class="logo">
                <img src="geokrantilogo-removebg.png" alt="" width="120px" height="120px">
            </div>
            <h1 id="header">Create an Account</h1>
            <p>Lets get started with a free account it's easy. Please fill up your details below</p>

            <!-- Full Name -->
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user" style="color: #3699fc"></i></span>
                <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                    value="{{ old('full_name') }}" required>
                @error('full_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Sponsor ID (Optional) -->

            <div class="input-group position-relative">
                <span class="input-group-text"><i class="fas fa-user-tag" style="color: #3699fc"></i></span>
                <input type="text" name="sponsor_id" id="sponsor_id" class="form-control" placeholder="Sponsor ID"
                    required value="{{ old('sponsor_id') }}">
                <span id="sponsor-status" style="position: absolute; right: 10px; top: 10px;"></span>
            </div>
            @error('sponsor_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <small id="sponsor-message" style="color: gray;"></small>

            <!-- parent id -->
            <div class="input-group position-relative">
                <span class="input-group-text"><i class="fas fa-user-tag" style="color: #3699fc"></i></span>
                <input type="text" name="parent_id" id="parent_id" class="form-control"
                    placeholder="Parent ID(optional)" required value="{{ old('parent_id') }}">
                <span id="parent-status" style="position: absolute; right: 10px; top: 10px;"></span>
            </div>
            @error('parent_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <small id="parent-message" style="color: gray;"></small>

            <!-- Email -->
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope" style="color: #3699fc"></i></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
                    required value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <!-- Phone -->
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone" style="color: #3699fc"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required
                    value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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



            <div class="input-group position-relative">
                <span class="input-group-text"><i class="fas fa-lock" style="color: #3699fc"></i></span>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Confirm Password" required>
                <i class="fas fa-eye toggle-password" toggle="#password_confirmation"
                    style="position: absolute; right: 15px; top: 10px; cursor: pointer; color: #3699fc;"></i>
            </div>

            <div class="privacy-policy">
                <div class="form-check">
                    <input type="checkbox" name="privacy_policy" id="privacy_policy" class="form-check-input"
                        required>
                    <label class="form-check-label" for="privacy_policy">
                        I agree to the Privacy Policy and Terms of Service
                    </label>
                </div>
            </div>

            <button type="submit" id="sendData"
                onclick="return confirm('Are you sure you want to register this user ?')">Sign Up</button>

            <p class="message">Already registered?
                <a href="{{ route('auth.login') }}">Sign In</a>
            </p>
            <p class="text-center">आओ साथ मिलकर प्रकृति खेती से जूडें ।</p>
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
            <p class="message"> Not registered? <button type="button" name="button" id="create">&nbsp;Create an
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
