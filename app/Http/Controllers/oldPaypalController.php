<?php
  
namespace App\Http\Controllers;
  
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

use App\Http\Controllers\DonationController;
use App\Http\Requests\DonationStoreRequest;
use App\Models\Donation;
use App\Models\User;

class PayPalController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('paypal');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => session('amount'),
                    ]
                ]
            ]
        ]);
  
        if (isset($response['id']) && $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
  
        } else {
            return redirect()
                ->back()
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel()
    {
        if(session('form_type') === 'donation'){
            Donation::find(session('donation_id'))->delete();
            session()->flush();
            return redirect()->route('donation.index')->with('error', 'You have canceled the transaction.');
        }else{
            User::find(session('member_id'))->delete();
            session()->flush();
            return redirect()->route('member.index')->with('error', 'You have canceled the transaction.');

        }
    }
  
    /**
     * Write code on Method 
     * Written by Appfinz Technologies
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
  
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            if(session('form_type') === 'donation'){
                session()->flush();
                return redirect()->route('donation.index')->with('success', 'Transaction complete.');
            }else{
                session()->flush();
                return redirect()->route('member.index')->with('success', 'Transaction complete.');
    
            }
        } else {
            
            return redirect()
                ->route('payment.cancel')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}