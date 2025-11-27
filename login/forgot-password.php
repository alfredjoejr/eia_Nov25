<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>
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
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="cube">
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
    </div>
    <main class="w-full max-w-md">
        <div class="card-container rounded-xl p-6 sm:p-8">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800">Forgot password?</h1>
                <p class="mt-2 text-sm text-gray-600">
                    Remember your password?
                    <a class="text-primary-600 decoration-2 hover:underline font-medium" href="login.php">
                        Login here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <form id="resetForm" method="post">
                    <div class="grid gap-y-4">
                        <div>
                            <label for="email" class="block text-sm font-bold ml-1 mb-2 text-gray-700">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" 
                                       class="py-3 px-4 block w-full border border-gray-300 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 shadow-sm bg-white/90" 
                                       required
                                       aria-describedby="email-error">
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address</p>
                        </div>
                        <button type="submit" id="submitBtn" class="submit-btn py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg border border-transparent font-semibold text-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 text-sm">
                            Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center text-sm text-white mt-4">
            © EIA 2024 | Made with <span class="text-red-400">❤️</span> by 
            <a href="https://jeffersonben.github.io/" target="_blank" class="text-white hover:underline font-medium">Jefferson</a>
        </div>
    </main>

    <script>
        document.getElementById('resetForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const email = document.getElementById('email').value;
            const emailError = document.getElementById('email-error');
            
            // Basic validation
            if (!email.includes('@')) {
                emailError.classList.remove('hidden');
                return;
            } else {
                emailError.classList.add('hidden');
            }
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';
            
            try {
                const response = await fetch('send-password-reset.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `email=${encodeURIComponent(email)}`
                });
                
                const result = await response.text();
                
                if (response.ok) {
                    await Swal.fire({
                        title: 'Email Sent!',
                        html: `
                            <div class="text-center space-y-3">
                                <div class="w-16 h-16 rounded-full bg-primary-100 flex items-center justify-center mb-3 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary-500">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <p class="text-gray-600">Check your inbox for the password reset link</p>
                            </div>
                        `,
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: '!rounded-xl'
                        }
                    });
                    document.getElementById('resetForm').reset();
                } else {
                    throw new Error(result || 'Failed to send reset link');
                }
            } catch (error) {
                await Swal.fire({
                    title: 'Error!',
                    html: `
                        <div class="text-center space-y-3">
                            <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-3 mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <p class="text-gray-600">${error.message}</p>
                        </div>
                    `,
                    confirmButtonText: 'Try Again',
                    customClass: {
                        popup: '!rounded-xl'
                    }
                });
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Reset password';
            }
        });
    </script>
    <!-- Font Awesome for loading spinner -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>