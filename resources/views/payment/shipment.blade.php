
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shipment Details</title>
   <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <style>
       /* shipment details page CSS */
       :root {
           --muted-rose: #CB8D9A;
           --soft-lilac: #9D98AE;
           --dusky-blue: #8497B5;
           --peach-glow: #EFAF96;
           --warm-coral: #EA9087;
           --very-light-pink: #FEF7FF;
       }
       body {
           background-color: var(--very-light-pink);
           font-family: Arial, sans-serif;
       }
       .shipment-container {
           max-width: 600px;
           margin: 40px auto;
           padding: 20px;
           background-color: white;
           border-radius: 8px;
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
       }
       .shipment-container h2 {
           text-align: center;
           color: var(--dusky-blue);
           font-weight: bold;
       }
       .form-group {
           margin-bottom: 16px;
       }
       .form-group label {
           display: block;
           margin-bottom: 6px;
           color: var(--dusky-blue);
           font-weight: 600;
       }
       .shipment-container input,
       .shipment-container select {
           width: 100%;
           padding: 10px;
           margin: 8px 0;
           border: 1px solid var(--soft-lilac);
           border-radius: 5px;
       }
       .shipment-container button {
           padding: 12px;
           background-color: var(--warm-coral);
           color: white;
           cursor: pointer;
           transition: background 0.3s ease;
           border: none;
           width: 100%;
       }
       .shipment-container button:hover {
           background-color: var(--peach-glow);
       }
       .flex-space-x-4 {
           display: flex;
           gap: 12px;
       }
       .alert {
           background-color: var(--muted-rose);
           color: white;
           padding: 10px;
           border-radius: 4px;
           text-align: center;
           margin-bottom: 16px;
       }
       small {
           color: var(--dusky-blue);
           display: block;
           margin-top: 4px;
       }
   </style>
</head>
<body>
   <div class="shipment-container">
       <h2>Shipment Details</h2>

       <?php
       // Display the payment receipt from the session if available.
       if (session()->has('receipt')) {
           $receipt = session('receipt');
           ?>
           <div class="alert" style="background-color: #CB8D9A;"> <!-- You may adjust the color as needed -->
               <h3>Payment Receipt</h3>
               <p><strong>Reference Number:</strong> <?php echo htmlspecialchars($receipt['ref_number']); ?></p>
               <p><strong>Payment Time:</strong> <?php echo htmlspecialchars($receipt['payment_time']); ?></p>
               <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($receipt['payment_method_label']); ?></p>
               <p><strong>Sender Name:</strong> <?php echo htmlspecialchars($receipt['sender_name']); ?></p>
               <p><strong>Amount Paid:</strong> <?php echo htmlspecialchars($receipt['amount_paid']); ?></p>
               <p><strong>Discount Code:</strong> <?php echo !empty($receipt['discount_code']) ? htmlspecialchars($receipt['discount_code']) : 'N/A'; ?></p>
               <p><strong>Admin Fee:</strong> <?php echo htmlspecialchars($receipt['admin_fee']); ?></p>
               <p><strong>Status:</strong> <?php echo htmlspecialchars($receipt['payment_status']); ?></p>
           </div>
           <?php
       }
       ?>

       <?php if ($errors->any()): ?>
           <div class="alert">
               <ul>
                   <?php foreach ($errors->all() as $error): ?>
                       <li><?php echo $error; ?></li>
                   <?php endforeach; ?>
               </ul>
           </div>
       <?php endif; ?>

       <form method="POST" action="<?php echo route('shipment.process'); ?>">
           <?php echo csrf_field(); ?>

           <div class="form-group">
               <label for="recipient_name">Recipient Name</label>
               <input type="text" name="recipient_name" id="recipient_name" placeholder="Enter the recipient's name" required value="<?php echo old('recipient_name'); ?>">
           </div>

           <div class="form-group">
               <label for="contact_number">Contact Number</label>
               <input type="text" 
                      name="contact_number" 
                      id="contact_number" 
                      placeholder="+973 00000000" 
                      required 
                      value="<?php echo old('contact_number'); ?>"
                      pattern="[0-9]{8}" 
                      minlength="8" 
                      maxlength="8"
                      title="Please enter exactly 8 digits with no spaces or symbols.">
               <small>Enter exactly 8 digits with no letters or special characters.</small>
           </div>

           <!-- Split Address into Street, Road, and House Number -->
           <div class="form-group">
               <label for="street">Street</label>
               <input type="text" 
                      name="street" 
                      id="street" 
                      placeholder="Enter street name" 
                      required 
                      value="<?php echo old('street'); ?>"
                      pattern="^(?=.{3,})[A-Za-z0-9\s]+$" 
                      title="Street must be at least 3 characters, using only letters, numbers, and spaces.">
               <small>Enter a valid street name (at least 3 characters).</small>
           </div>

           <div class="form-group">
               <label for="road">Road</label>
               <input type="text" 
                      name="road" 
                      id="road" 
                      placeholder="Enter road name" 
                      required 
                      value="<?php echo old('road'); ?>"
                      pattern="^(?=.{3,})[A-Za-z0-9\s]+$" 
                      title="Road must be at least 3 characters, using only letters, numbers, and spaces.">
               <small>Enter a valid road name (at least 3 characters).</small>
           </div>

           <div class="form-group">
               <label for="house_number">House Number</label>
               <input type="text" 
                      name="house_number" 
                      id="house_number" 
                      placeholder="Enter house number" 
                      required 
                      value="<?php echo old('house_number'); ?>"
                      pattern="^(?=.{1,10}$)\d+[A-Za-z]*$" 
                      title="House Number must be 1 to 10 characters, start with digits and may include letters.">
               <small>Enter a valid house number (e.g., 123 or 123A, 1-10 characters).</small>
           </div>
           <!-- End of Split Address -->

           <div class="form-group">
               <label for="country">Region</label>
               <select name="country" id="country" required>
                   <option value="">Select a region</option>
                   <option value="Manama" <?php echo old('country') == 'Manama' ? 'selected' : ''; ?>>Manama</option>
                   <option value="Muharraq" <?php echo old('country') == 'Muharraq' ? 'selected' : ''; ?>>Muharraq</option>
                   <option value="Riffa" <?php echo old('country') == 'Riffa' ? 'selected' : ''; ?>>Riffa</option>
                   <option value="Isa Town" <?php echo old('country') == 'Isa Town' ? 'selected' : ''; ?>>Isa Town</option>
                   <option value="Sitra" <?php echo old('country') == 'Sitra' ? 'selected' : ''; ?>>Sitra</option>
                   <option value="Budaiya" <?php echo old('country') == 'Budaiya' ? 'selected' : ''; ?>>Budaiya</option>
               </select>
           </div>

           <div class="flex-space-x-4" style="margin-top: 20px;">
               <button type="submit">Confirm Shipment</button>
               <button type="reset" >Cancel</button>
           </div>
       </form>
   </div>
   
   <script>
       document.addEventListener("DOMContentLoaded", function() {
           console.log("Shipment page loaded.");
       });
   </script>
</body>
</html>