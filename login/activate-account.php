<?php
$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE account_activation_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die('<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Activation Error</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Activation Error",
                    html: `
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-3 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                            <p class="text-gray-600">Invalid or expired activation token.</p>
                        </div>
                    `,
                    confirmButtonText: "Go to Login",
                    customClass: {
                        popup: "!rounded-lg !py-6",
                        confirmButton: "!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md"
                    },
                    buttonsStyling: false
                }).then(() => {
                    window.location.href = "index.php";
                });
            });
        </script>
    </body>
    </html>');
}

$sql = "UPDATE user SET account_activation_hash = NULL WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $user["id"]);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activated</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(135deg, #4070f4 0%, #4070f4 100%);
            min-height: 100vh;
        }
        .card-container {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }
        .swal2-popup {
            border-radius: 12px !important;
            background-color: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(8px) !important;
        }
        .submit-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #4070f4 100%);
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

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
        :root {
            --background: 0 0% 100%;
            --foreground: 222.2 84% 4.9%;
            --primary: 221.2 83.2% 53.3%;
            --primary-foreground: 210 40% 98%;
            --border: 214.3 31.8% 91.4%;
        }
        .card {
            background-color: hsl(var(--background));
            border: 1px solid hsl(var(--border));
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        }
        .btn-primary {
            background-color: hsl(var(--primary));
            color: hsl(var(--primary-foreground));
        }
        .btn-primary:hover {
            background-color: hsl(217.2 91.2% 59.8%);
        }
    </style>
</head>
<!-- HEAD remains same -->
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-2 sm:p-4">
    <div class="cube">
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
    </div>
    
    <div class="card w-full max-w-xs sm:max-w-md p-4 sm:p-6">
        <div class="flex flex-col items-center text-center">
            <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-green-100 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 w-6 h-6 sm:w-8 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
            </div>
            
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">Account Activated</h1>
            <p class="text-sm sm:text-base text-gray-600 mb-6">Your account has been successfully activated.</p>
            
            <a href="index.php" class="btn-primary inline-flex items-center justify-center rounded-md px-3 py-2 text-sm font-medium transition-colors hover:shadow-md">
                Continue to Login
            </a>
        </div>
        <div class="text-center text-xs sm:text-sm text-black mt-4 px-2 text-wrap">
            © EIA 2024 | Made with <span class="text-red-400">❤️</span> by 
            <a href="https://jeffersonben.github.io/" target="_blank" class="text-black hover:underline font-medium">Jefferson</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Account Activated',
                html: `
                    <div class="text-center text-sm">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mb-3 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <p class="text-gray-600">Your account has been successfully activated.</p>
                    </div>
                `,
                confirmButtonText: 'Continue to Login',
                customClass: {
                    popup: '!rounded-lg !py-6 !text-sm sm:!text-base',
                    confirmButton: '!bg-blue-600 !hover:bg-blue-700 !text-white !px-3 !py-2 !rounded-md'
                },
                buttonsStyling: false,
                showCloseButton: true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        });
    </script>
</body>

</html>