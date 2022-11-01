<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $address = $user->address() ? $user->address()->first() : null;
        return view('address.index')->with('user', $user)->with('address', $address);
    }

    public function store(Request $request, User $user)
    {
        if ($user->address()) {
            $user->update([
                'name' => $request->name,
                'number' => $request->number
            ]);
        }
        $user->address()->create([
            'address' => $request->address,
            'postal_id' => $request->postal_id
        ]);
        return redirect()->back();
    }
}
