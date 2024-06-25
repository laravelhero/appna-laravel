<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {

        $profilePhotoPath = null;
        $licensePath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('temp');
        }

        if ($request->hasFile('license')) {
            $licensePath = $request->file('license')->store('temp');
        }

        session([
            'form_type' => 'member',
            'amount' => $request->member_fee,
            'form' => $request->validated(),
            'profilePhotoPath' => $profilePhotoPath,
            'licensePath' => $licensePath,

        ]);
        return redirect()->route('paypal.payment');
    }
}
