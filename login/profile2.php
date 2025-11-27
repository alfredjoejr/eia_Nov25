<?php
session_start();

// 1. ADD THESE HEADERS: Prevent browser caching
// This forces the browser to re-request the page from the server
// instead of showing an old, cached version.
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.


// 2. MODIFY YOUR "IF" STATEMENT
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    // Good practice: also check if the user was found in the DB
    if ( ! $user) {
        // This could happen if user was deleted but session still exists
        // Log them out and redirect
        session_unset();
        session_destroy();
        
        header("Location: index.php"); // <-- Change this to your login page
        exit;
    }

} else {
    // 3. THIS IS THE NEW PART: User is NOT logged in
    // Redirect them to the login page immediately
    header("Location: index.php"); // <-- Change this to your login page
    
    // IMPORTANT: Stop the script right here.
    // This prevents the rest of the HTML (and the errors) from ever running.
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile | EIA</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

</head>

<body class=" text-gray-900">
  <div class="min-h-screen p-4">
    <header class="flex items-center justify-center gap-4 p-4 bg-white rounded-xl shadow-lg mb-6">
      <a href="https://eia.lk/Mentor/index.php">
          <img src="img/eia.png" alt="logo" class="w-15 h-10 rounded-full" /></a>
            <span class="text-xl font-bold">Education Incentive Association</span>

    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <div class="bg-white p-6 rounded-xl shadow-lg col-span-1 flex flex-col items-center">
        <form action="upload-profile.php" method="post" enctype="multipart/form-data" id="profilePicForm" class="flex flex-col items-center">
        
            <?php
              // 1. PHP logic to set the image path
              $profile_pic_path = !empty($user["profile_image_path"]) 
                  ? htmlspecialchars($user["profile_image_path"]) 
                  : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
            ?>
            <label for="profile_pic_input" class="relative cursor-pointer group">
              <img src="<?= $profile_pic_path ?>" alt="profile" class="w-40 h-40 rounded-full shadow-md mb-4 object-cover" />
        
              <div class="absolute inset-0 w-40 h-40 rounded-full bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <i class="ri-camera-line text-white text-3xl"></i>
              </div>
            </label>
        
            <input type="file" name="profile_pic" id="profile_pic_input" class="hidden" accept="image/png, image/jpeg, image/gif" />
        
          </form>
        
          <h2 class="text-2xl font-bold text-gray-800 mt-4"><?= htmlspecialchars($user["name"]) ?></h2>
          <p class="text-gray-600 text-sm font-medium"><?= htmlspecialchars($user["designation"]) ?></p>
        
          <div class="mt-6 flex flex-col w-full gap-3">
            <a href="#" id="updateMembershipBtn" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-sm">
              <i class="ri-shield-user-line mr-2"></i> Update Membership
            </a>
            <a href="mailto:eiawebmaster@duck.com" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-sm">
              <i class="ri-bug-line mr-2"></i> Report Issue
            </a>
            <a href="logout.php" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 shadow-sm">
              <i class="ri-logout-box-r-line mr-2"></i> Log Out
            </a>
          </div>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-lg col-span-1 flex flex-col gap-6">
        <div>
          <h2 class="text-xl font-bold mb-4 flex items-center text-gray-800">
            <i class="ri-lightbulb-flash-line mr-2 text-blue-600"></i> EIA's Purpose
          </h2>
          <div class="mb-4 bg-blue-50 p-4 rounded-lg border border-blue-200">
            <h3 class="font-semibold text-blue-800 flex items-center gap-2 mb-1">
              <i class="ri-eye-line"></i>Vision
            </h3>
            <p class="text-sm text-gray-700 leading-relaxed">To be a guiding light of knowledge and support, empowering science stream students in the Eastern part of Sri Lanka to achieve academic excellence and create future leaders.</p>
          </div>
          <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
            <h3 class="font-semibold text-blue-800 flex items-center gap-2 mb-1">
              <i class="ri-flag-line"></i>Mission
            </h3>
            <p class="text-sm text-gray-700 leading-relaxed">To provide intellectual support and resources to the science stream students in Batticaloa and Ampara, fostering social connections and organizing academic events to enhance their educational experiences. We strive to promote equality, peace, and sustainable development within our organization and the wider community, while disseminating relevant information and cooperating with other educational bodies to address the economic and social challenges faced by our students. </p>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-lg col-span-1">
        <div class="mb-4">
          <ul class="flex gap-4 border-b pb-2">
            <li class="text-blue-600 font-semibold flex items-center gap-1">
              <i class="ri-user-line"></i> Personal Details
            </li>
          </ul>
        </div>
        
        <div class="mb-6 space-y-3 text-sm text-gray-800">
            <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">User ID: </span>
            <span>
                <?php 
                // Get the last two digits of the year (e.g., 2023 -> 23)
                $shortYear = substr($user["examYear"], -2);
                $safeId = htmlspecialchars($user["id"]);
        
                // Check memType to determine the ID format
                if ($user['memType'] === 'Graduate') {
                    // Graduate logic: GM + YY + 00 + ID
                    echo "GM" . $shortYear . "00" . $safeId;
                } elseif ($user['memType'] === 'Pre-University' || $user['memType'] === 'Undergraduate') {
                    // Pre-Uni or Undergrad logic: UM + YY + 00 + ID
                    echo "UM" . $shortYear . "00" . $safeId;
                } else {
                    // Fallback to original format if type is unknown
                    echo "EIA-" . htmlspecialchars($user["examYear"]) . "-" . $safeId;
                }
                ?>
            </span>
        </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">Full Name</span>
            <span><?= htmlspecialchars($user["fullName"]) ?></span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">University</span>
            <span><?= htmlspecialchars($user["university"]) ?></span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">Course</span>
            <span><?= htmlspecialchars($user["course"]) ?></span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-600">Member Type</span>
            <span><?= htmlspecialchars($user["memType"]) ?></span>
          </div>
          <div class="flex justify-between items-center">
          <span class="font-semibold text-gray-600">Membership Status</span>
          
          <?php 
          // 1. Check if membership is ACTIVE
          if ($user["is_paid"] == 1): 
          ?>
            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
              Active
            </span>

          <?php 
          // 2. If NOT active (it's expired)
          else: 
          ?>
            <div class="flex items-center gap-2">
              <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                Expired
              </span>
              
              <?php 
              // 3. AND if it's NOT verified, show the verify button
              if (isset($user["is_paid"]) && $user["is_paid"] == 0): 
              ?>
                <a href="#" id="verifyMembershipBtn" class="inline-flex items-center px-3 py-1 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-sm">
                  <i class="ri-whatsapp-line mr-1"></i> Verify
                </a>
              <?php endif; // End of is_verified check ?>

            </div>
          <?php endif; // End of is_paid check ?>
        </div>        
        
        
        
        
        
        </div>

        <div class="border-t pt-4">
          <h3 class="font-semibold mb-3 flex items-center gap-2 text-gray-800">
            <i class="ri-contacts-book-line text-blue-600"></i>Contact Information
          </h3>
          <ul class="text-sm text-gray-800 space-y-2">
            <li class="flex justify-between"><strong class="text-gray-600">Phone:</strong> <span><?= htmlspecialchars($user["wano"]) ?></span></li>
            <li class="flex justify-between"><strong class="text-gray-600">Email:</strong> <span><?= htmlspecialchars($user["email"]) ?></span></li>
            <li class="flex justify-between"><strong class="text-gray-600">Address:</strong> <span><?= htmlspecialchars($user["address"]) ?></span></li>
          </ul>
        </div>
        
        <div class="mt-4 border-t pt-4">
          <h3 class="font-semibold mb-3 flex items-center gap-2 text-gray-800">
            <i class="ri-information-line text-blue-600"></i>Basic Information
          </h3>
          <ul class="text-sm text-gray-800 space-y-2">
            <li class="flex justify-between"><strong class="text-gray-600">Birthday:</strong> <span><?= htmlspecialchars($user["dob"]) ?></span></li>
            <li class="flex justify-between"><strong class="text-gray-600">Gender:</strong> <span><?= htmlspecialchars($user["sex"]) ?></span></li>
          </ul>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Wait for the DOM to be fully loaded before running scripts
    document.addEventListener('DOMContentLoaded', function() {
      
      // --- 1. Code for "Update Membership" Button ---
      const updateBtn = document.getElementById('updateMembershipBtn');
      if (updateBtn) {
        updateBtn.addEventListener('click', function(e) {
          e.preventDefault();
          Swal.fire({
            title: 'Update Membership',
            html: `<p class="mb-4 text-gray-700">Contact Senior Secretary.</p>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Connect',
            cancelButtonText: 'Cancel',
            customClass: {
              confirmButton: 'bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded ml-4',
              cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-4 rounded'
            },
            buttonsStyling: false,
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'mailto:eiawebmaster@duck.com';
            }
          });
        });
      }

      // --- 2. Code for Profile Picture Auto-Submit ---
// --- 2. NEW Code for Profile Picture Cropping ---
      const profilePicInput = document.getElementById('profile_pic_input');
      const modalElement = document.getElementById('croppie-modal');
      const croppieContainer = document.getElementById('croppie-container');
      const cropAndUploadBtn = document.getElementById('crop-and-upload-btn');
      
      // We need to use the Flowbite Modal object to control it with JS
      const modal = new Modal(modalElement);
      
      let croppieInstance = null;

      // Function to initialize Croppie
      function initializeCroppie() {
        if (croppieInstance) {
          croppieInstance.destroy();
          croppieInstance = null;
        }
        // Initialize Croppie
        croppieInstance = new Croppie(croppieContainer, {
          viewport: { width: 200, height: 200, type: 'circle' }, // Perfect for a profile pic
          boundary: { width: 300, height: 300 },
          enableExif: true
        });
      }

      // 1. Listen for the user selecting a file
      if (profilePicInput) {
        profilePicInput.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
              // Initialize croppie and bind the image
              initializeCroppie();
              croppieInstance.bind({
                url: e.target.result
              });
              // Show the modal
              modal.show();
            };

            reader.readAsDataURL(file);
          }
        });
      }

      // 2. Listen for the "Crop & Upload" button click
      if (cropAndUploadBtn) {
        cropAndUploadBtn.addEventListener('click', function(e) {
          e.preventDefault();

          // Show loading state on button
          this.textContent = 'Uploading...';
          this.disabled = true;

          // Get the cropped image data as a 'blob' (which is like a file)
          croppieInstance.result({
            type: 'blob',
            format: 'png', // You can use 'jpeg' or 'png'
            size: { width: 400, height: 400 } // Set output size
          }).then(function(blob) {
            
            // Create a FormData object to send the file
            const formData = new FormData();
            // IMPORTANT: The name 'profile_pic' must match what your PHP script expects
            formData.append('profile_pic', blob, 'profile.png');

            // Use fetch() to upload the image to your existing PHP script
            fetch('upload-profile.php', {
              method: 'POST',
              body: formData
            })
            .then(response => response.json()) // Assuming your PHP returns JSON
            .then(data => {
              if (data.success) { // Check for a success flag from your PHP
                Swal.fire({
                  title: 'Success!',
                  text: 'Profile picture updated.',
                  icon: 'success'
                }).then(() => {
                  location.reload(); // Reload the page to show the new image
                });
              } else {
                // Show error message from server
                Swal.fire('Error', data.message || 'Could not upload image.', 'error');
              }
            })
            .catch(error => {
              Swal.fire('Error', 'An error occurred. Please try again.', 'error');
              console.error('Upload error:', error);
            })
            .finally(() => {
              // Reset button and hide modal
              cropAndUploadBtn.textContent = 'Crop & Upload';
              cropAndUploadBtn.disabled = false;
              modal.hide();
            });
          });
        });
      }
      // --- 3. NEW: Code for "Verify Membership" Button ---
      const verifyBtn = document.getElementById('verifyMembershipBtn');
      if (verifyBtn) {
        verifyBtn.addEventListener('click', function(e) {
          e.preventDefault();
          
          Swal.fire({
            title: 'Verify Membership',
            html: `<p class="mb-4 text-gray-700">You will be redirected to WhatsApp to complete your verification.</p>`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Continue to WhatsApp',
            cancelButtonText: 'Cancel',
            customClass: {
              confirmButton: 'bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded ml-4',
              cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-4 rounded'
            },
            buttonsStyling: false,
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              // 
              // *** IMPORTANT: Change this placeholder number ***
              // 
              window.location.href = 'https://wa.me/94XXXXXXXXX'; // (Example: https://wa.me/94771234567)
            }
          });
        });
      }
      
    });
  </script>
  
  <div id="croppie-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Crop Your Image
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="croppie-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div id="croppie-container" class="w-full"></div>
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button id="crop-and-upload-btn" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Crop & Upload
                </button>
                <button data-modal-hide="croppie-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  Cancel
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
```