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
            border: 2px solid var(--very-light-pink);
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--muted-rose);
            border-color: var(--soft-lilac);
        }

        .btn-primary
        {
            background-color: var(--warm-coral);
            border-color: var(--very-light-pink);
        }
            
    </style>
</head>

<body>
        <div class="container">

            @if(isset($receipt) && !empty($receipt))
                <div class="receipt-summary">
                    <h2>Payment Receipt</h2>
                    <table class="table table-bordered">
                      
                        <tr>
                            <th>Payment Time</th>
                            <td>{{ $receipt['paid_at'] }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $receipt['method'] }}</td>
                        </tr>
                    
                        <tr>
                            <th>Amount Paid</th>
                            <td>${{ number_format($receipt['amount'], 2) }}</td>
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
                    <p>Delivery Boy: Matt</p>
            @endif
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57265.269766784215!2d50.630105634278316!3d26.22661080226398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49af722776a62d%3A0x8b6738a6070f60c2!2z2KfZhNmF2YbYp9mF2Kk!5e0!3m2!1sar!2sbh!4v1747481545747!5m2!1sar!2sbh" width="910" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            <div  id="tracking-map"></div>

            <a href="/" class="btn btn-primary mt-4" name="button">Back to home</a>
        </div>
     
</body>
</html>