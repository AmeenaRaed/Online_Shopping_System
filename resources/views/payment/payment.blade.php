<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Vite (for development with Laravel + Tailwind) -->
  @vite(['resources/css/payment.css'])

  <!-- Fallback or production CSS -->
  <link rel="stylesheet" href="{{ asset('css/payment.css') }}">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    /* Remove spinner arrows in number inputs */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body class="bg-gray-50">
  <div class="max-w-2xl mx-auto p-6 mt-10">

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div>
  @endif

    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Payment Method</h2>

    <form method="POST" action="{{ route('payment.process') }}">
      @csrf

      <!-- Hidden order ID field -->
      <input type="hidden" name="order_id" value="{{ $orderId }}">

      <p>{{ $orderId }}</p>


      <div class="mb-4">
        <label for="sender_name" class="block text-sm font-medium text-gray-700">Sender Name</label>
        <input type="text" name="sender_name" id="sender_name"
          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter your name"
          required>
      </div>

      <div class="mb-4">
        <label for="amount_paid" class="block text-sm font-medium text-gray-700">Amount Paid</label>
        <input type="number" name="amount_paid" id="amount_paid"
          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter amount paid"
          step="any" min="5.00" required>
      </div>

      <div class="mb-4">
        <label for="discount_code" class="block text-sm font-medium text-gray-700">
          Discount Code <span class="text-sm text-gray-500">(Optional)</span>
        </label>
        <input type="text" name="discount_code" id="discount_code"
          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="Enter discount code"
          maxlength="4" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}"
          title="4 characters, must include a letter and a digit">
      </div>

      <div class="mb-4">
        <span class="block text-sm font-medium text-gray-700 mb-2">Select a Payment Method:</span>
        <div class="flex space-x-4">
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" value="master" data-target="#master_details"
              class="form-radio text-blue-500" required>
            <span class="ml-2 text-gray-600"><i class="bi bi-credit-card text-xl"></i> Master Card</span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" value="paypal" data-target="#paypal_details"
              class="form-radio text-blue-500">
            <span class="ml-2 text-gray-600"><i class="bi bi-paypal text-xl"></i> PayPal</span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="payment_method" value="apple" data-target="#apple_details"
              class="form-radio text-blue-500">
            <span class="ml-2 text-gray-600"><i class="bi bi-apple text-xl"></i> Apple Pay</span>
          </label>
        </div>
      </div>

      <!-- Master Card Details -->
      <div id="master_details" class="payment-details mb-4" style="display:none;">
        <div class="mb-4">
          <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
          <input type="text" name="card_number" id="card_number"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400"
            placeholder="Enter your Master Card number" pattern="^\d{16}$" title="Enter a 16-digit card number">
        </div>
        <div class="mb-4">
          <label for="card_expiry" class="block text-sm font-medium text-gray-700">Expiry Date (MM/YY)</label>
          <input type="text" name="card_expiry" id="card_expiry"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="MM/YY"
            pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="Format: MM/YY">
        </div>
        <div class="mb-4">
          <label for="card_cvv" class="block text-sm font-medium text-gray-700">CVV</label>
          <input type="text" name="card_cvv" id="card_cvv"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400" placeholder="CVV"
            pattern="^\d{3}$" title="Enter a 3-digit CVV">
        </div>
      </div>

      <!-- PayPal Details -->
      <div id="paypal_details" class="payment-details mb-4" style="display:none;">
        <div class="mb-4">
          <label for="paypal_email" class="block text-sm font-medium text-gray-700">PayPal Email</label>
          <input type="email" name="paypal_email" id="paypal_email"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400"
            placeholder="Enter your PayPal email">
        </div>
      </div>

      <!-- Apple Pay Details -->
      <div id="apple_details" class="payment-details mb-4" style="display:none;">
        <div class="mb-4">
          <label for="apple_account" class="block text-sm font-medium text-gray-700">Apple Account</label>
          <input type="text" name="apple_account" id="apple_account"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400"
            placeholder="Enter your Apple account">
        </div>
        <div class="mb-4">
          <label for="apple_password" class="block text-sm font-medium text-gray-700">Apple Password</label>
          <input type="password" name="apple_password" id="apple_password"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-400"
            placeholder="Enter your Apple password" minlength="8" title="Password must be at least 8 characters">
        </div>
      </div>

      <div class="flex space-x-4 mt-4">
        <button type="submit" name="action" value="pay"
          class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
          Pay
        </button>

        <button type="submit" name="action" value="cancel"
          class="w-full py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
          Cancel Payment
        </button>
      </div>

    </form>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const paymentDetails = document.querySelectorAll(".payment-details");
      paymentDetails.forEach(d => d.style.display = "none");

      document.querySelectorAll("input[name='payment_method']").forEach(radio => {
        radio.addEventListener("change", function () {
          paymentDetails.forEach(d => d.style.display = "none");
          const target = this.dataset.target;
          if (target) document.querySelector(target).style.display = "block";
        });
      });
    });
  </script>
</body>



</html>