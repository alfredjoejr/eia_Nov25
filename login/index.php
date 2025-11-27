<?php
// THIS IS THE GLOBAL SESSION FIX
// It MUST be placed before session_start()
session_set_cookie_params(['path' => '/']);

// Now start the session
session_start();

// Redirect if already logged in
if (isset($_SESSION["user_id"])) {
    header("Location: profile2.php");
    exit;
}

$is_invalid = false;

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";

    // --- SECURITY FIX (Use Prepared Statements) ---
    // This prevents SQL injection.
    $sql = "SELECT * FROM user WHERE email = ?";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]); // "s" for string
    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    // --- END OF SECURITY FIX ---

    // Check account is activated and password is correct
    if ($user && $user["account_activation_hash"] === null) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            // Session was already started at the top.
            // Now we just regenerate the ID and set the user.
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: profile2.php");
            exit;
        }
    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up | EIA</title>
    <link rel="icon" type="image/x-icon" href="./img/eia.png">
    <link rel="stylesheet" href="style/style_login.css" />
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
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <a href="../Mentor/index.php">
                    <img src="./img/eia.png" alt="eia" />
                </a>
                <h4>Education Incentive Association</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $is_invalid): ?>
                  <em>Invalid login</em>
              <?php endif; ?>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" class="input-field" required>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" id="password" value="<?= htmlspecialchars($_POST["password"] ?? "") ?>" class="input-field" required>
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="forgot-password.php">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="signup.php" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="./img/eia.png" alt="easyclass" />
                <h4>Education Incentive Association</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                
                  <div class="instruction-box">
                    <p class="instruction-heading">📋 Please read before signing up:</p>
                    <ul class="instruction-list">
                      <li>✅ A <strong>valid email</strong> and password are required to create an account.</li>
                      <li>🚫 Do not use <strong>offensive or vulgar language</strong> in your username or profile.</li>
                      <li>👤 Only <strong>one account per person</strong> is allowed.</li>
                    </ul>
                  </div>
                <input type="submit" value="Sign Up" class="sign-btn" onclick="window.location.href='signup.php';" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="https://live.staticflickr.com/65535/54466609635_7cb5e19884_b.jpg" class="image img-1 show" alt="" />
              
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>30+ years Services</h2>
                
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="js/app_login.js"></script>
  </body>
</html>
