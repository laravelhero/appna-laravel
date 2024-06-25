<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PayPalController;


Route::get('/', [UserController::class, 'index'])->name('member.index');
Route::post('/', [UserController::class, 'store'])->name('member.store');

Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
Route::post('/donation', [DonationController::class, 'store'])->name('donation.store');

Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');