<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $validatedData = $request->validate([
            'sender_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric|min:5.00',
            'discount_code' => 'nullable|string|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4}$/',
            'payment_method' => 'required|in:master,paypal,apple',
            'card_number' => 'sometimes|required_if:payment_method,master|digits:16',
            'card_expiry' => 'sometimes|required_if:payment_method,master|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
            'card_cvv' => 'sometimes|required_if:payment_method,master|digits:3',
            'paypal_email' => 'sometimes|required_if:payment_method,paypal|email',
            'apple_account' => 'sometimes|required_if:payment_method,apple|regex:/^[A-Za-z0-9]{8}$/',
        ]);

        try {
            $payment = Payment::create([
                'ref_number' => 'REF' . bin2hex(random_bytes(4)),
                'payment_time' => now(),
                'payment_method_label' => ucfirst($validatedData['payment_method']),
                'sender_name' => $validatedData['sender_name'],
                'amount_paid' => $validatedData['amount_paid'],
                'discount_code' => $validatedData['discount_code'] ?? null,
                'admin_fee' => 1.00,
                'payment_status' => 'Successful',
            ]);

            Session::put('receipt', $payment);
            return redirect()->route('shipment.page');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'System error. Please try again later.']);
        }
    }
}
