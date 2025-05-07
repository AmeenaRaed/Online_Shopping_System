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
            }
            if (empty($card_expiry)) {
                $errors[] = "Expiry date is required for Master Card.";
            }
            if (empty($card_cvv)) {
                $errors[] = "CVV is required for Master Card.";
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
            if (empty($apple_account)) {
                $errors[] = "Apple account is required.";
            } elseif (!preg_match('/^[A-Za-z0-9]{8}$/', $apple_account)) {
                $errors[] = "Apple account must be 8 alphanumeric characters.";
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
        $admin_fee = 1.00;
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
        
        // Redirect to the receipt page.
        if(isset($_POST['Pay']))
        {header("Location: receipt.php");
        exit();
        }
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <link rel="stylesheet" href="payment.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".payment-details").hide();
      $("input[name='payment_method']").on("change", function(){
          $(".payment-details").hide();
          var target = $(this).data("target");
          $(target).show();
      });
      $("input.form-control").on("input", function(){
          if ($(this).val() !== "") {
              $(this).addClass("filled");
          } else {
              $(this).removeClass("filled");
          }
      });
    });
  </script>
</head>
<body>
<div class="container mt-5">
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors as $err): ?>
          <li><?php echo htmlspecialchars($err); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  
  <h2 class="mb-4 text-center">Payment Method</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="sender_name">Sender Name</label>
      <input type="text" name="sender_name" id="sender_name" class="form-control" placeholder="Enter your name" required>
    </div>
    <div class="form-group">
      <label for="amount_paid">Amount Paid</label>
      <input type="number" name="amount_paid" id="amount_paid" class="form-control" placeholder="Enter amount paid" step="0.500" min="0.500" required>
    </div>
    <div class="form-group">
      <label for="discount_code">Discount Code <small>(Optional)</small></label>
      <input type="text" name="discount_code" id="discount_code" class="form-control" placeholder="Enter discount code" maxlength="4" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}" title="4 characters, must include a letter and a digit">
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="master" value="master" data-target="#master_details" required>
        <label class="form-check-label" for="master"><i class="bi bi-credit-card" style="font-size:24px;"></i> Master Card</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal" data-target="#paypal_details">
        <label class="form-check-label" for="paypal"><i class="bi bi-paypal" style="font-size:24px;"></i> PayPal</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="apple" value="apple" data-target="#apple_details">
        <label class="form-check-label" for="apple"><i class="fab fa-apple-pay" style="font-size:24px;"></i> Apple Pay</label>
      </div>
    </div>
    
    <div id="master_details" class="payment-details">
      <div class="form-group">
        <label for="card_number">Card Number</label>
        <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Enter your Master Card number" pattern="^\d{16}$" title="Enter a 16-digit card number" required>
      </div>
      <div class="form-group">
        <label for="card_expiry">Expiry Date (MM/YY)</label>
        <input type="text" name="card_expiry" id="card_expiry" class="form-control" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="Format: MM/YY" required>
      </div>
      <div class="form-group">
        <label for="card_cvv">CVV</label>
        <input type="text" name="card_cvv" id="card_cvv" class="form-control" placeholder="CVV" pattern="^\d{3}$" title="Enter a 3-digit CVV" required>
      </div>
    </div>
    
    <div id="paypal_details" class="payment-details">
      <div class="form-group">
        <label for="paypal_email">PayPal Email</label>
        <input type="email" name="paypal_email" id="paypal_email" class="form-control" placeholder="Enter your PayPal email" required>
      </div>
    </div>
    
    <div id="apple_details" class="payment-details">
      <div class="form-group">
        <label for="apple_account">Apple Account</label>
        <input type="text" name="apple_account" id="apple_account" class="form-control" placeholder="Enter your Apple account" pattern="^[A-Za-z0-9]{8}$" minlength="8" maxlength="8" title="Apple account must be 8 alphanumeric characters" required>
      </div>
    </div>
    
    <div class="form-group mt-4">
      <button type="reset" class="btn btn-secondary">Cancel Payment</button>
      <button type="submit" class="btn btn-primary" name="Pay">Pay</button>
      <a href="new_payment_method.php" class="btn btn-primary">+ Payment Method</a>
    </div>
  </form>
</div>
</body>
</html>