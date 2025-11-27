<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style/style_signup.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>

    <title>SignUp | EIA</title>
    <style>
        .cube div {
          position: absolute;
          width: 60px;
          height: 60px;
          background-color: transparent;
          border: 6px solid rgba(255,255,255,0.8);
        }
        .cube div:nth-child(1) { top: 12%; left: 42%; animation: animate 10s linear infinite; }
        .cube div:nth-child(2) { top: 70%; left: 50%; animation: animate 7s linear infinite; }
        .cube div:nth-child(3) { top: 17%; left: 6%; animation: animate 9s linear infinite; }
        .cube div:nth-child(4) { top: 20%; left: 60%; animation: animate 10s linear infinite; }
        .cube div:nth-child(5) { top: 67%; left: 10%; animation: animate 6s linear infinite; }
        .cube div:nth-child(6) { top: 80%; left: 70%; animation: animate 12s linear infinite; }
        .cube div:nth-child(7) { top: 60%; left: 80%; animation: animate 15s linear infinite; }
        .cube div:nth-child(8) { top: 32%; left: 25%; animation: animate 16s linear infinite; }
        .cube div:nth-child(9) { top: 90%; left: 25%; animation: animate 9s linear infinite; }
        .cube div:nth-child(10) { top: 20%; left: 80%; animation: animate 5s linear infinite; }
  
        @keyframes animate {
          0% { transform: scale(0) translateY(-90px) rotate(360deg); opacity: 1; }
          100% { transform: scale(1.3) translateY(-90px) rotate(-180deg); border-radius: 50%; opacity: 0; }
        }
    </style> 
</head>
<body>
    <div class="cube">
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
    </div>

    <div class="container">
        <header>Sign Up</header>

        <form action="process-signup.php" method="post" id="signup" novalidate>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Display Name</label>
                            <input type="text" name="name" placeholder="Enter your name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                            <input type="text" name="fullName" placeholder="Enter your full name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Date of birth</label>
                            <input type="date" name="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Whatsapp Number</label>
                            <input type="tel" name="wano" placeholder="Enter whatsapp number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                            <select name="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <input type="text" name="address" placeholder="Enter your address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">University</label>
                            <select name="university" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="">Select University</option>
                                <option value="University of Moratuwa">University of Moratuwa</option>
                                <option value="University of Colombo">University of Colombo</option>
                                <option value="University of Peradeniya">University of Peradeniya</option>
                                <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                                <option value="University of Kelaniya">University of Kelaniya</option>
                                <option value="University of Ruhuna">University of Ruhuna</option>
                                <option value="University of Jaffna">University of Jaffna</option>
                                <option value="Eastern University">Eastern University</option>
                                <option value="South Eastern University">South Eastern University</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Course</label>
                            <input type="text" name="course" placeholder=".............." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Designation</label>
                            <input type="text" name="designation" placeholder=".............." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">N.I.C Number</label>
                            <input type="text" name="nic" placeholder="Enter NIC number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Member Type</label>
                            <select name="memType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="">Select</option>
                                <option value="Graduate">Graduate</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Pre-University">Pre-University</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Exam Sat Year</label>
                            <input type="number" name="examYear" placeholder="Enter year" min="1900" max="2099" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Exam Sat Chance</label>
                            <select name="shy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="">Select</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                        </div>

                        <div class="input-field">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Repeat Password</label>
                            <input type="password" name="password_confirmation" placeholder="Retype Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                    </div>

                    <div class="flex items-start mb-4">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a></label>
                    </div>

                    <button class="sumbit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white" type="submit">
                        <span class="btnText">Create Account</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>
        </form>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="js/script_signup.js"></script>
</body>
</html>