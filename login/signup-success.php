<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Successful | EIA</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4070f4 0%, #4070f4 100%);
        }
        
        .success-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .checkmark-circle {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .resend-btn {
            background: linear-gradient(135deg, #0063f2 0%, #1a56db 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .resend-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
        }
        
        .contact-link {
            transition: all 0.2s ease;
        }
        
        .contact-link:hover {
            color: #1a56db;
            transform: translateY(-1px);
        }
        
        /* SweetAlert customizations */
        .swal2-popup {
            border-radius: 12px !important;
            font-family: 'Poppins', sans-serif !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2) !important;
        }
        
        .swal2-title {
            font-size: 1.25rem !important;
            font-weight: 600 !important;
            color: #111827 !important;
        }
        
        .swal2-html-container {
            font-size: 0.95rem !important;
            color: #4b5563 !important;
        }
        
        .swal2-confirm {
            background: linear-gradient(135deg, #0063f2 0%, #1a56db 100%) !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.5rem !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
        }
        
        .swal2-confirm:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3) !important;
        }
        
        .swal2-cancel {
            background-color: #f3f4f6 !important;
            color: #111827 !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.5rem !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
        }
        
        .swal2-cancel:hover {
            background-color: #e5e7eb !important;
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
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="cube">
        <div></div><div></div><div></div><div></div><div></div>
        <div></div><div></div><div></div><div></div><div></div>
    </div>
    <div class="success-card max-w-md w-full rounded-xl overflow-hidden p-8 sm:p-10">
        <div class="flex flex-col items-center text-center space-y-6">
            <!-- Animated checkmark (in blue) -->
            <div class="checkmark-circle w-20 h-20 rounded-full flex items-center justify-center mb-2 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            
            <div class="space-y-2">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Welcome to EIA!</h1>
                <p class="text-gray-600">Your account has been created successfully.</p>
            </div>
            
            <div class="w-full border-t border-gray-200 my-4"></div>
            
            <div class="space-y-4 w-full">
                <p class="text-gray-600 text-sm">Please check your email to activate your account.<br>(If can't find the mail please check the spam folder)</p>
                
                <button id="resendBtn" class="resend-btn w-full py-3 px-4 rounded-lg text-white font-medium flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane"></i>
                    Resend Activation Email
                </button>
            </div>
            
            <div class="w-full border-t border-gray-200 my-4"></div>
            
            <div class="text-sm text-gray-600">
                <p class="mb-2">Didn't receive the email?</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="mailto:joashjeshurun9@protonmail.ch" class="contact-link text-blue-600 font-medium inline-flex items-center gap-1">
                        <i class="fas fa-envelope"></i> Contact Support
                    </a>
                    <span class="hidden sm:block text-gray-300">|</span>
                    <a href="https://api.whatsapp.com/send?phone=94777778984&text=I%20didn%27t%20receive%20the%20vertification%20email%20from%20www.eia.lk" class="contact-link text-green-600 font-medium inline-flex items-center gap-1">
                        <i class="fab fa-whatsapp"></i> WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-sm text-black mt-4">
            © EIA 2025 | Made with <span class="text-red-400">❤️</span> by 
            <a href="https://jeffersonben.github.io/" target="_blank" class="text-black hover:underline font-medium">Jefferson</a>
        </div>
    
    </div>

    
    <script>
        // Show SweetAlert2 confirmation when page loads
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Registration Complete!',
                html: `
                    <div class="text-center space-y-3">
                        <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-3 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <p class="text-gray-600">We've sent an activation link to your email. Please verify to complete your registration.</p>
                    </div>
                `,
                confirmButtonText: 'Got it!',
                showCloseButton: true,
                focusConfirm: false,
                customClass: {
                    popup: '!py-6',
                    closeButton: '!text-gray-400 hover:!text-gray-600'
                }
            });
        });

        // Handle resend button click
        document.getElementById('resendBtn').addEventListener('click', function() {
            const btn = this;
            const originalText = btn.innerHTML;
            
            // Show loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            btn.disabled = true;
            
            Swal.fire({
                title: 'Resend Activation Email',
                html: `
                    <div class="text-center space-y-3">
                        <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-3 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <p class="text-gray-600">We'll send another activation link to your registered email address.</p>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Send Now',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                reverseButtons: true,
                customClass: {
                    popup: '!py-6',
                    actions: '!mt-4 !gap-3'
                }
            }).then((result) => {
                // Reset button state
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                if (result.isConfirmed) {
                    // Simulate API call
                    setTimeout(() => {
                        Swal.fire({
                            title: 'Email Sent!',
                            html: `
                                <div class="text-center space-y-3">
                                    <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-3 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <p class="text-gray-600">A new activation link has been sent to your email address.</p>
                                </div>
                            `,
                            confirmButtonText: 'Okay',
                            showCloseButton: true
                        });
                    }, 1000);
                }
            });
        });
    </script>
</body>
</html>