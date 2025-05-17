<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\shipments;
use App\Models\Order;

class ShipmentController extends Controller
{
    public function show(Order $order)
    {
        return view("payment.shipment", compact('order'));
    }

    public function processShipment(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'contact_number' => [
                'required',
                'regex:/^\d{8}$/' // Must be exactly 8 digits
            ],
            'street' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?=.{3,})[A-Za-z0-9\s]+$/'
            ],
            'road' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?=.{3,})[A-Za-z0-9\s]+$/'
            ],
            'house_number' => [
                'required',
                'string',
                'max:10',
                'regex:/^(?=.{1,10}$)\d+[A-Za-z]*$/'
            ],
            'country' => 'required|string|in:Manama,Muharraq,Riffa,Isa Town,Sitra,Budaiya',
        ], [
            'contact_number.regex' => 'The contact number must contain exactly 8 digits.',
            'street.regex' => 'Street must be at least 3 characters long and contain only letters, numbers, and spaces.',
            'road.regex' => 'Road must be at least 3 characters long and contain only letters, numbers, and spaces.',
            'house_number.regex' => 'House Number must be between 1 and 10 characters, start with digits and may include letters.',
            'country.in' => 'Please select a valid region from the dropdown.',
        ]);

        Session::forget('receipt'); // Clear any stored payment receipt
        foreach ($order->products as $product) {
            $orderedQty = $product->pivot->quantity;
            if ($product->stock_quantity < $orderedQty) {
                return back()->withErrors(['stock' => "Not enough stock for {$product->name}."]);
            }
            $product->stock_quantity -= $orderedQty;
            $product->save();
        }

        $order->status = 'Shipped';

        $validatedData['order_id'] = $order->id;
        $validatedData['shipment_status'] = 'Pending';
        $validatedData['tracking_number'] = null;

        Shipments::create($validatedData);


        return redirect()->route('shipment.confirmation', ['order' => $order->id]);
    }

    public function showReceiptTracking(Order $order)
    {
        $shipment = $order->shipments;

        if (!$shipment) {
            return redirect()->route('index')->withErrors(['Shipment not found.']);
        }

        $payment = $order->payment;

        $paymentDetails = $payment ? [
            'method' => $payment->method,
            'amount' => $payment->amount,
            'paid_at' => $payment->paid_at ,
            'payment_status' => $payment->payment_status,
        ] : null;

        return view('payment.shipmentConfirmation', [
            'receipt' => $paymentDetails,
            'shipmentDetails' => [
                'recipient_name' => $shipment->recipient_name,
                'contact_number' => $shipment->contact_number,
                'street' => $shipment->street,
                'road' => $shipment->road,
                'house_number' => $shipment->house_number,
                'country' => $shipment->country,
            ],
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
    }
}
