<?php
ob_start(); // Start output buffering.
session_start(); // Start the session.

// Initialize error and payment variables.
$errors = [];
$message = "";
$ref_number = "";
$payment_time = "";
$payment_method_label = "";
$admin_fee = 0;
$payment_status = "";

// Initialize form field variables.
$sender_name = "";
$amount_paid = "";
$discount_code = "";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get and check the sender name.
    $sender_name = trim($_POST['sender_name'] ?? "");
    if (empty($sender_name)) {
        $errors[] = "Sender name is required.";
    }
    
    // Get and check the amount paid.
    $amount_paid = trim($_POST['amount_paid'] ?? "");
    if (empty($amount_paid)) {
        $errors[] = "Amount paid is required.";
    } elseif (!is_numeric($amount_paid) || floatval($amount_paid) <= 0) {
        $errors[] = "Amount paid must be a positive number.";
    }
    
    // Optional discount code; must be exactly 4 characters with at least 1 letter and 1 digit.
    $discount_code = trim($_POST['discount_code'] ?? "");
    if (!empty($discount_code) && !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}$/', $discount_code)) {
        $errors[] = "Discount code must be 4 characters long and include letters and digits.";
    }

    // Get the selected payment method.
    $payment_method = trim($_POST["payment_method"] ?? "");
    if (empty($payment_method)) {
        $errors[] = "Please choose a payment method.";
    } else {
        if ($payment_method == "master") {
            $card_number = trim($_POST["card_number"] ?? "");
            $card_expiry = trim($_POST["card_expiry"] ?? "");
            $card_cvv = trim($_POST["card_cvv"] ?? "");
            if (empty($card_number)) {
                $errors[] = "Master Card number is required.";
            } elseif (!preg_match('/^\d{16}$/', $card_number)) {
                $errors[] = "Master Card number must be exactly 16 digits.";
            }
            if (empty($card_expiry)) {
                $errors[] = "Expiry date is required for Master Card.";
            } elseif (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $card_expiry)) {
                $errors[] = "Expiry date must be in the format MM/YY.";
            }
            if (empty($card_cvv)) {
                $errors[] = "CVV is required for Master Card.";
            } elseif (!preg_match('/^\d{3}$/', $card_cvv)) {
                $errors[] = "CVV must be exactly 3 digits.";
            }
        } elseif ($payment_method == "paypal") {
            $paypal_email = trim($_POST["paypal_email"] ?? "");
            if (empty($paypal_email)) {
                $errors[] = "PayPal email is required.";
            } elseif (!filter_var($paypal_email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid PayPal email address.";
            }
        } elseif ($payment_method == "apple") {
            $apple_account = trim($_POST["apple_account"] ?? "");
            $apple_password = trim($_POST["apple_password"] ?? "");
            if (empty($apple_account)) {
                $errors[] = "Apple account is required.";
            }
            if (empty($apple_password)) {
                $errors[] = "Apple password is required.";
            } elseif (strlen($apple_password) < 8) {
                $errors[] = "Apple password must be at least 8 characters long.";
            }
        }
    }
    
    // If there are no errors, process the payment.
    if (empty($errors)) {
        try {
            $ref_number = 'REF' . bin2hex(random_bytes(4));
        } catch(Exception $e) {
            $errors[] = "System error. Please try again later.";
        }
        $payment_time = date('Y-m-d H:i:s');
        
        // Set payment method label.
        switch ($payment_method) {
            case "master":
                $payment_method_label = "Master Card";
                break;
            case "paypal":
                $payment_method_label = "PayPal";
                break;
            case "apple":
                $payment_method_label = "Apple Pay";
                break;
        }
        $admin_fee = 2.00;  // Admin Fee updated to 2.00 BD.
        $payment_status = "Successful";
        $message = "Payment processed successfully";
        
        // Save the receipt data in the session.
        $_SESSION['receipt'] = [
            'ref_number'           => $ref_number,
            'payment_time'         => $payment_time,
            'payment_method_label' => $payment_method_label,
            'sender_name'          => $sender_name,
            'amount_paid'          => $amount_paid,
            'discount_code'        => $discount_code,
            'admin_fee'            => $admin_fee,
            'payment_status'       => $payment_status,
            'message'              => $message
        ];
        
        // Redirect to shipment.blade.php after processing payment.
        if (isset($_POST['Pay'])) {
            header("Location: shipment.blade.php");
            exit();
        }
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/css/app.css'])
  <meta charset="UTF-8">
  <title>Payment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS (compiled to public/css/app.css) -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Inline CSS to remove spinner arrows for number input -->
  <style>
    /* Remove spinner arrows in Chrome, Safari, Edge, Opera */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    /* For Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
  </style>
</head>
<body class="bg-gray-50">
  <div class="max-w-2xl mx-auto p-6 mt-10">
    <?php if (!empty($errors)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
          <?php foreach ($errors as $err): ?>
            <li><?php echo htmlspecialchars($err); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Payment Method</h2>
    
    <!-- The form uses HTML5 validations so that submission occurs only when fields are correctly filled -->
    <form method="post" action="">
      <!-- CSRF Token -->
      {{ csrf_field() }}
      
      <div class="mb-4">
        <label for="sender_name" class="block text-sm font-medium text-gray-700">Sender Name</label>
        <input type="text" name="sender_name" id="sender_name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your name" required>
      </div>
      
      <div class="mb-4">
        <label for="amount_paid" class="block text-sm font-medium text-gray-700">Amount Paid</label>
        <!-- The amount field is type number -->
        <input type="number" name="amount_paid" id="amount_paid" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter amount paid" step="any" min="5.00" required>
      </div>
      
      <div class="mb-4">
        <label for="discount_code" class="block text-sm font-medium text-gray-700">
          Discount Code <span class="text-sm text-gray-500">(Optional)</span>
        </label>
        <input type="text" name="discount_code" id="discount_code" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter discount code" maxlength="4" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}" title="4 characters, must include a letter and a digit">
      </div>
      
      <div class="mb-4">
        <span class="block text-sm font-medium text-gray-700 mb-2">Select a Payment Method:</span>
        <div class="flex space-x-4">
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" id="master" value="master" data-target="#master_details" class="form-radio text-blue-500" required>
            <span class="ml-2 text-gray-600">
              <i class="bi bi-credit-card" style="font-size:24px;"></i> Master Card
            </span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" id="paypal" value="paypal" data-target="#paypal_details" class="form-radio text-blue-500">
            <span class="ml-2 text-gray-600">
              <i class="bi bi-paypal" style="font-size:24px;"></i> PayPal
            </span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" id="apple" value="apple" data-target="#apple_details" class="form-radio text-blue-500">
            <span class="ml-2 text-gray-600">
              <i class="bi bi-apple" style="font-size:24px;"></i> Apple Pay
            </span>
          </label>
        </div>
      </div>
      
      <!-- Master Card Details -->
      <div id="master_details" class="payment-details mb-4">
        <div class="mb-4">
          <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
          <input type="text" name="card_number" id="card_number" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your Master Card number" pattern="^\d{16}$" title="Enter a 16-digit card number" required>
        </div>
        <div class="mb-4">
          <label for="card_expiry" class="block text-sm font-medium text-gray-700">Expiry Date (MM/YY)</label>
          <input type="text" name="card_expiry" id="card_expiry" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="Format: MM/YY" required>
        </div>
        <div class="mb-4">
          <label for="card_cvv" class="block text-sm font-medium text-gray-700">CVV</label>
          <input type="text" name="card_cvv" id="card_cvv" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="CVV" pattern="^\d{3}$" title="Enter a 3-digit CVV" required>
        </div>
      </div>
      
      <!-- PayPal Details -->
      <div id="paypal_details" class="payment-details mb-4">
        <div class="mb-4">
          <label for="paypal_email" class="block text-sm font-medium text-gray-700">PayPal Email</label>
          <input type="email" name="paypal_email" id="paypal_email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your PayPal email" required>
        </div>
      </div>
      
      <!-- Apple Pay Details -->
      <div id="apple_details" class="payment-details mb-4">
        <div class="mb-4">
          <label for="apple_account" class="block text-sm font-medium text-gray-700">Apple Account</label>
          <input type="text" name="apple_account" id="apple_account" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your Apple account" required>
        </div>
        <div class="mb-4">
          <label for="apple_password" class="block text-sm font-medium text-gray-700">Apple Password</label>
          <input type="password" name="apple_password" id="apple_password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your Apple password" minlength="8" title="Password must be at least 8 characters" required>
        </div>
      </div>
      
      <div class="flex space-x-4 mt-4">
        <button type="reset" class="w-full py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel Payment</button>
        <button type="submit" name="Pay" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Pay</button>
        <!-- + Payment Method button with updated alert message -->
        <button type="button" id="add-payment-method" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
          + Payment Method
        </button>
      </div>
    </form>
  </div>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Hide all payment details sections by default.
      var paymentDetails = document.querySelectorAll(".payment-details");
      paymentDetails.forEach(function(detail) {
        detail.style.display = "none";
      });
      
      // When a payment method radio is selected, display its associated fields.
      var radios = document.querySelectorAll("input[name='payment_method']");
      radios.forEach(function(radio) {
        radio.addEventListener("change", function() {
          paymentDetails.forEach(function(detail) {
            detail.style.display = "none";
          });
          var target = radio.getAttribute("data-target");
          if (target) {
            document.querySelector(target).style.display = "block";
          }
        });
      });
      
      // Optional: Add a class to inputs if they are not empty.
      var inputs = document.querySelectorAll("input");
      inputs.forEach(function(input) {
        input.addEventListener("input", function() {
          if (input.value !== "") {
            input.classList.add("filled");
          } else {
            input.classList.remove("filled");
          }
        });
      });
      
      // Updated alert for the "+ Payment Method" button.
      document.getElementById("add-payment-method").addEventListener("click", function() {
        alert("Additional Payment Method functionality is not implemented yet. This is coming soon.");
      });
    });
  </script>
</body>
</html>