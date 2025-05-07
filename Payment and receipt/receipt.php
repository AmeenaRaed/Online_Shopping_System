<?php
session_start();
if (!isset($_SESSION['receipt'])) {
    header("Location: payment.php");
    exit();
}
$receipt = $_SESSION['receipt'];
unset($_SESSION['receipt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>
  <link rel="stylesheet" href="payment.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    function printReceipt() {
      window.print();
    }
  </script>
</head>
<body>
<div class="container mt-5">
  <div class="receipt mt-4">
    <h3 class="text-center">
      <?php if ($receipt['payment_status'] === "Successful"): ?>
        <i class="fa fa-check-circle" aria-hidden="true" style="color: #28a745; font-size: 40px;"></i>
      <?php endif; ?>
      Payment Receipt
    </h3>
    <table class="table table-bordered">
      <tr>
        <th>Reference Number</th>
        <td><?php echo htmlspecialchars($receipt['ref_number']); ?></td>
      </tr>
      <tr>
        <th>Payment Time</th>
        <td><?php echo htmlspecialchars($receipt['payment_time']); ?></td>
      </tr>
      <tr>
        <th>Payment Method</th>
        <td><?php echo htmlspecialchars($receipt['payment_method_label']); ?></td>
      </tr>
      <tr>
        <th>Sender Name</th>
        <td><?php echo htmlspecialchars($receipt['sender_name']); ?></td>
      </tr>
      <tr>
        <th>Amount Paid</th>
        <td><?php echo "$" . htmlspecialchars(number_format($receipt['amount_paid'], 2)); ?></td>
      </tr>
      <?php if (!empty($receipt['discount_code'])): ?>
      <tr>
        <th>Discount Code</th>
        <td><?php echo htmlspecialchars($receipt['discount_code']); ?></td>
      </tr>
      <?php endif; ?>
      <tr>
        <th>Admin Fee</th>
        <td><?php echo "$" . number_format($receipt['admin_fee'], 2); ?></td>
      </tr>
      <tr>
        <th>Payment Status</th>
        <td><?php echo $receipt['payment_status']; ?></td>
      </tr>
    </table>
    <div class="text-center mt-3">
      <button onclick="printReceipt()" class="btn btn-primary">
        <i class="fa fa-print" aria-hidden="true" style="margin-right: 5px;"></i> Print Receipt
      </button>
    </div>
  </div>
</div>
</body>
</html>