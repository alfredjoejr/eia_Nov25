<?php
$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
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
        <title>Invalid Token</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Invalid Token",
                    html: `
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-3 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                            <p class="text-gray-600">The password reset link is invalid or has expired.</p>
                        </div>
                    `,
                    confirmButtonText: "Request New Link",
                    customClass: {
                        popup: "!rounded-lg !py-6",
                        confirmButton: "!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md"
                    },
                    buttonsStyling: false
                }).then(() => {
                    window.location.href = "forgot-password.php";
                });
            });
        </script>
    </body>
    </html>');
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die('<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Expired Token</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Link Expired",
                    html: `
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center mb-3 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">This password reset link has expired. Please request a new one.</p>
                        </div>
                    `,
                    confirmButtonText: "Get New Link",
                    customClass: {
                        popup: "!rounded-lg !py-6",
                        confirmButton: "!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md"
                    },
                    buttonsStyling: false
                }).then(() => {
                    window.location.href = "forgot-password.php";
                });
            });
        </script>
    </body>
    </html>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --background: 0 0% 100%;
            --foreground: 222.2 84% 4.9%;
            --primary: 221.2 83.2% 53.3%;
            --primary-foreground: 210 40% 98%;
            --border: 214.3 31.8% 91.4%;
            --input: 214.3 31.8% 91.4%;
            --ring: 221.2 83.2% 53.3%;
        }
        .card {
            background-color: hsl(var(--background));
            border: 1px solid hsl(var(--border));
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        }
        .input {
            display: block;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid hsl(var(--input));
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            transition: border-color 0.15s ease;
        }
        .input:focus {
            outline: none;
            border-color: hsl(var(--ring));
            box-shadow: 0 0 0 2px hsl(var(--ring)/0.1);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.875rem;
            line-height: 1.25rem;
            padding: 0.5rem 1rem;
            transition: all 0.15s ease;
        }
        .btn-primary {
            background-color: hsl(var(--primary));
            color: hsl(var(--primary-foreground));
        }
        .btn-primary:hover {
            background-color: hsl(217.2 91.2% 59.8%);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
    <div class="card max-w-md w-full p-6 sm:p-8 mb-4">
        <div class="flex flex-col space-y-6">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                        <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                <p class="text-gray-600">Create a new password for your account</p>
            </div>

            <form id="resetForm" method="post" action="process-reset-password.php" class="space-y-4">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" name="password" required
                           class="input" placeholder="Enter new password">
                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters with a number</p>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           class="input" placeholder="Repeat new password">
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    Reset Password
                </button>
            </form>
        </div>
    </div>

    <div class="text-center text-sm text-gray-500 mt-4">
        © EIA 2024 | Made with <span class="text-red-500">❤️</span> by 
        <a href="https://jefferson.com" target="_blank" class="text-blue-600 hover:underline">Jefferson</a>
    </div>

    <script>
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            // Basic client-side validation
            if (password.length < 8) {
                e.preventDefault();
                Swal.fire({
                    title: 'Password Too Short',
                    text: 'Password must be at least 8 characters',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: '!rounded-lg !py-6',
                        confirmButton: '!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md'
                    },
                    buttonsStyling: false
                });
                return;
            }

            if (!/\d/.test(password)) {
                e.preventDefault();
                Swal.fire({
                    title: 'Password Needs Number',
                    text: 'Password must contain at least one number',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: '!rounded-lg !py-6',
                        confirmButton: '!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md'
                    },
                    buttonsStyling: false
                });
                return;
            }

            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({
                    title: 'Passwords Mismatch',
                    text: 'Passwords do not match',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: '!rounded-lg !py-6',
                        confirmButton: '!bg-blue-600 !hover:bg-blue-700 !text-white !px-4 !py-2 !rounded-md'
                    },
                    buttonsStyling: false
                });
            }
        });
    </script>
</body>
</html>