<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
            color: var(--dusky-blue);
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2, h3, h4 {
            color: var(--muted-rose);
        }

        .table th {
            background-color: var(--warm-coral);
            color: var(--very-light-pink);
        }

        .table td {
            background-color: var(--muted-rose);
            color: var(--very-light-pink);
        }

        button {
            background-color: var(--warm-coral);
            color: var(--very-light-pink);
            border: 2px solid var(--dusky-blue);
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--muted-rose);
            border-color: var(--soft-lilac);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($receipt) && !empty($receipt)): ?>
            <div class="receipt-summary">
                <h2>Payment Receipt</h2>
                <table class="table table-bordered">
                    <tr><th>Reference Number</th><td><?php echo htmlspecialchars($receipt['ref_number']); ?></td></tr>
                    <tr><th>Payment Time</th><td><?php echo htmlspecialchars($receipt['payment_time']); ?></td></tr>
                    <tr><th>Payment Method</th><td><?php echo htmlspecialchars($receipt['payment_method_label']); ?></td></tr>
                    <tr><th>Sender Name</th><td><?php echo htmlspecialchars($receipt['sender_name']); ?></td></tr>
                    <tr><th>Amount Paid</th><td>$<?php echo number_format($receipt['amount_paid'], 2); ?></td></tr>
                    <?php if (!empty($receipt['discount_code'])): ?>
                        <tr><th>Discount Code</th><td><?php echo htmlspecialchars($receipt['discount_code']); ?></td></tr>
                    <?php endif; ?>
                    <tr><th>Admin Fee</th><td>$<?php echo number_format($receipt['admin_fee'], 2); ?></td></tr>
                    <tr><th>Payment Status</th><td><?php echo htmlspecialchars($receipt['payment_status']); ?></td></tr>
                </table>
            </div>
        <?php endif; ?>

        <?php if (isset($shipmentDetails) && !empty($shipmentDetails)): ?>
            <div class="shipment-info">
                <h2>Shipment Details</h2>
                <table class="table table-bordered">
                    <tr><th>Recipient Name</th><td><?php echo htmlspecialchars($shipmentDetails['recipient_name']); ?></td></tr>
                    <tr><th>Contact Number</th><td><?php echo htmlspecialchars($shipmentDetails['contact_number']); ?></td></tr>
                    <tr><th>Street</th><td><?php echo htmlspecialchars($shipmentDetails['street']); ?></td></tr>
                    <tr><th>Road</th><td><?php echo htmlspecialchars($shipmentDetails['road']); ?></td></tr>
                    <tr><th>House Number</th><td><?php echo htmlspecialchars($shipmentDetails['house_number']); ?></td></tr>
                    <tr><th>Region</th><td><?php echo htmlspecialchars($shipmentDetails['country']); ?></td></tr>
                </table>
            </div>
        <?php endif; ?>

        <?php if (isset($fakeDeliveryBoy) && is_array($fakeDeliveryBoy)): ?>
            <div class="tracking-info">
                <h2>Track My Order</h2>
                <h4>Your order is <?php echo htmlspecialchars($fakeDeliveryBoy['distance_km']); ?> km away and <?php echo htmlspecialchars($fakeDeliveryBoy['time_minutes']); ?> minutes from home!</h4>
            </div>
        <?php else: ?>
            <p><strong>Error:</strong> Delivery info not available.</p>
        <?php endif; ?>

        <?php if (isset($fakeDeliveryBoy) && is_array($fakeDeliveryBoy)): ?>
            <div class="delivery-details">
                <h3><?php echo htmlspecialchars($fakeDeliveryBoy['name']); ?></h3>
                <p>Delivery Boy</p>
                <ul>
                    <?php foreach ($orderProcess as $step): ?>
                        <li><?php echo htmlspecialchars($step['step']); ?> (<?php echo isset($step['estimate']) ? htmlspecialchars($step['estimate']) : htmlspecialchars($step['location']); ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div id="tracking-map" style="height: 400px; width: 100%;"></div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var deliveryLocation = <?php echo json_encode($fakeDeliveryBoy['location'] ?? null); ?>;
            if (!deliveryLocation) {
                console.error("Delivery location data not available.");
                return;
            }
            if (Array.isArray(deliveryLocation)) {
                deliveryLocation = { lat: deliveryLocation[0], lng: deliveryLocation[1] };
            }
            var map = new google.maps.Map(document.getElementById('tracking-map'), { zoom: 14, center: deliveryLocation });
            new google.maps.Marker({ position: deliveryLocation, map: map });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <a href="{{ route('index') }}" class="btn btn-primary">Back to home</a>
</body>
</html>