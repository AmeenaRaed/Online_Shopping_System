<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShipmentController extends Controller
{
    public function show() {
        return view("payment.shipment");
    }
    public function processShipment(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'contact_number' => [
                'required',
                // Must be exactly 8 digits with nothing else.
                'regex:/^\d{8}$/'
            ],
            'street' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?=.{3,})[A-Za-z0-9\s]+$/'  // At least 3 characters, letters, numbers, spaces.
            ],
            'road' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?=.{3,})[A-Za-z0-9\s]+$/'  // At least 3 characters, letters, numbers, spaces.
            ],
            'house_number' => [
                'required',
                'string',
                'max:10',
                'regex:/^(?=.{1,10}$)\d+[A-Za-z]*$/' // 1 to 10 characters, must start with digits and may include letters.
            ],
            'country' => 'required|string|in:Manama,Muharraq,Riffa,Isa Town,Sitra,Budaiya',
        ], [
            'contact_number.regex' => 'The contact number must contain exactly 8 digits and no letters or other characters are allowed.',
            'street.regex'         => 'Street must be at least 3 characters long and contain only letters, numbers, and spaces.',
            'road.regex'           => 'Road must be at least 3 characters long and contain only letters, numbers, and spaces.',
            'house_number.regex'   => 'House Number must be between 1 and 10 characters, start with digits and may include letters.',
            'country.in'           => 'Please select a valid region from the dropdown.',
        ]);

        // Process the validated shipment data (for example, save it to the database)
        // Optionally clear any existing payment receipt stored in the session.
        Session::forget('receipt');

        // Redirect to a confirmation page with a success message.
        return redirect()->route('shipment.confirmation')
            ->with('message', 'Shipment details successfully processed.');
    }

    // A simple confirmation view
    public function confirmation()
    {
        return view('payment.shipment-confirmation');
    }

 public function showReceiptTracking()
{
    return view('receipt_tracking', [
        'receipt' => session('receipt') ?? null,
        'fakeDeliveryBoy' => [
            "name" => "Matt",
            "status" => "On the way",
            "distance_km" => rand(1, 10),
            "time_minutes" => rand(5, 30),
            "location" => ["lat" => 26.2285, "lng" => 50.5860],
        ],
        'orderProcess' => [
            ["step" => "Packaging Order", "estimate" => "10 mins"],
            ["step" => "On the Way", "estimate" => "25 mins"],
            ["step" => "Delivered", "location" => "House 12, Street 45, Al-Hidd"],
        ]
    ]);
    return view('receipt_tracking', compact('fakeDeliveryBoy'));
}

 public function store(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'contact_number' => 'required|digits:8',
            'street' => 'required|string|max:255',
            'road' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'region' => 'required|string',
            'receipt_ref_number' => 'required|string',
        ]);

        // Save shipment details into the database
        Shipments::create($validatedData);

        // Redirect with success message
        return redirect()->route('shipment.page')->with('success', 'Shipment details saved successfully!');
    }
}