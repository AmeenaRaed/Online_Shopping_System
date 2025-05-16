<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class PaymentController extends Controller
{
    public function showForm($orderId)
    {
        $order = Order::findOrFail($orderId);


        return view('payment.payment', ['orderId' => $orderId, 'orderTotal' => $order->total + 4.99]);
    }

    public function process(Request $request)
    {
        // dd($request->all());

        if ($request->input('action') === 'cancel') {
            return redirect()->route('payment.cancelled')->with('message', 'Payment was cancelled.');
        }

        // Validation for specific payment methods is not working
        $validated = $request->validate([
            'sender_name' => 'required|string',
            'amount_paid' => 'required|numeric|min:0.01',
            'discount_code' => ['nullable', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}$/'],
            'payment_method' => 'required|in:master,paypal,apple',
            // 'paypal_email' => 'required_if:payment_method,paypal|email',
            // 'card_number' => 'required_if:payment_method,master|numeric|digits:16',
            // 'card_cvv' => 'required_if:payment_method,master|numeric|digits:3',
            // 'apple_account' => 'required_if:payment_method,apple|string',
            // 'apple_password' => 'required_if:payment_method,apple|string|min:8',
        ]);

        // Process the payment
        $ref_number = 'REF' . bin2hex(random_bytes(4));
        $payment_time = now();
        $admin_fee = 2.00;
        $payment_status = "Successful";

        $method_labels = [
            'master' => 'Master Card',
            'paypal' => 'PayPal',
            'apple' => 'Apple Pay',
        ];

        $receipt = [
            'ref_number' => $ref_number,
            'payment_time' => $payment_time,
            'payment_method_label' => $method_labels[$request->payment_method],
            'sender_name' => $request->sender_name,
            'amount_paid' => $request->amount_paid,
            'admin_fee' => $admin_fee,
            'payment_status' => $payment_status,
        ];

        Session::put('receipt', $receipt);

        $orderId = $request->input('order_id');

        // Store payment data in the database
        Payment::create([
            'order_id' => $orderId,  // Use the passed orderId
            'method' => $request->payment_method,
            'amount' => $request->amount_paid,
            'paid_at' => $payment_time,
            'payment_status' => $payment_status
        ]);

        // Update the order status to 'pending'
        $order = Order::findOrFail($orderId);
        $order->update(['order_status' => 'pending']);

        // Redirect to shipment page after successful payment
        return redirect()->route('shipment.show' , $order);
    }

    public function store(Request $request)
    {

        $action = $request->input('action');

        if ($action === 'cancel') {
            return redirect()->route('payment.cancel');
        }

        if ($action === 'pay') {
            $request->validate([
                'sender_name' => 'required|string|max:255',
                'amount_paid' => 'required|numeric|min:5',
                'payment_method' => 'required|string|in:master,paypal,apple',
            ]);

            return redirect()->back()->with('success', 'Payment submitted successfully!');
        }
    }


    public function receipt()
    {
        if (!Session::has('receipt')) return redirect()->route('payment.form');

        return view('payment.receipt', ['receipt' => Session::get('receipt')]);
    }

    public function cancelPayment()
    {
        // Clear any session data related to the payment process
        Session::forget('receipt');
        return redirect()->route('payment.form'); // Redirect back to the payment form
    }
}
