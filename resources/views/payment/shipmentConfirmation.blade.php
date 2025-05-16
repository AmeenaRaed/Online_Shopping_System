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

        h2,
        h3,
        h4 {
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

            @if(isset($receipt) && !empty($receipt))
                <div class="receipt-summary">
                    <h2>Payment Receipt</h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>Reference Number</th>
                            <td>{{ $receipt['ref_number'] }}</td>
                        </tr>
                        <tr>
                            <th>Payment Time</th>
                            <td>{{ $receipt['payment_time'] }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $receipt['payment_method_label'] }}</td>
                        </tr>
                        <tr>
                            <th>Sender Name</th>
                            <td>{{ $receipt['sender_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Amount Paid</th>
                            <td>${{ number_format($receipt['amount_paid'], 2) }}</td>
                        </tr>
                        @if (!empty($receipt['discount_code']))
                            <tr>
                                <th>Discount Code</th>
                                <td>{{ $receipt['discount_code'] }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Admin Fee</th>
                            <td>${{ number_format($receipt['admin_fee'], 2) }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $receipt['payment_status'] }}</td>
                        </tr>
                    </table>
                </div>
            @endif

            @if(isset($shipmentDetails) && !empty($shipmentDetails))
                <div class="shipment-info">
                    <h2>Shipment Details</h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>Recipient Name</th>
                            <td>{{ $shipmentDetails['recipient_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $shipmentDetails['contact_number'] }}</td>
                        </tr>
                        <tr>
                            <th>Street</th>
                            <td>{{ $shipmentDetails['street'] }}</td>
                        </tr>
                        <tr>
                            <th>Road</th>
                            <td>{{ $shipmentDetails['road'] }}</td>
                        </tr>
                        <tr>
                            <th>House Number</th>
                            <td>{{ $shipmentDetails['house_number'] }}</td>
                        </tr>
                        <tr>
                            <th>Region</th>
                            <td>{{ $shipmentDetails['country'] }}</td>
                        </tr>
                    </table>
                </div>
            @endif

            @if(isset($fakeDeliveryBoy) && is_array($fakeDeliveryBoy))
                <div class="tracking-info">
                    <h2>Track My Order</h2>
                    <h4>Your order is {{ $fakeDeliveryBoy['distance_km'] }} km away and
                        {{ $fakeDeliveryBoy['time_minutes'] }} minutes from home!</h4>
                </div>
            @else
                <p><strong>Error:</strong> Delivery info not available.</p>
            @endif

            @if(isset($fakeDeliveryBoy) && is_array($fakeDeliveryBoy))
                <div class="delivery-details">
                    <h3>{{ $fakeDeliveryBoy['name'] }}</h3>
                    <p>Delivery Boy</p>
                    <ul>
                        @foreach ($orderProcess as $step)
                            <li>{{ $step['step'] }} ({{ $step['estimate'] ?? $step['location'] }})</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="tracking-map" style="height: 400px; width: 100%;"></div>

            <a href="/" class="btn btn-primary mt-4">Back to home</a>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
        <script>
            function initMap() {
                var deliveryLocation = @json($fakeDeliveryBoy['location'] ?? null);
                if (!deliveryLocation) {
                    console.error("Delivery location data not available.");
                    return;
                }
                if (Array.isArray(deliveryLocation)) {
                    deliveryLocation = { lat: deliveryLocation[0], lng: deliveryLocation[1] };
                }
                var map = new google.maps.Map(document.getElementById('tracking-map'), {
                    zoom: 14,
                    center: deliveryLocation
                });
                new google.maps.Marker({ position: deliveryLocation, map: map });
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>