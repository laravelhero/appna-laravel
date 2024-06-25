<?php

namespace App\Http\Controllers;

use App\Models\Donation;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DonationStoreRequest;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class DonationController extends Controller
{
    public function index(): View
    {
        return view('donation');
    }

    public function store(DonationStoreRequest $request): RedirectResponse
    {
        session(['form_type' => 'donation', 'amount' => $request->amount, 'form' => $request->validated()]);
        return redirect()->route('paypal.payment');
    }
}
