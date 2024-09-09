<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contacts;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contacts::where('user_id', auth()->id())->paginate(10);
        return view('dashboard', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $contacts = Contacts::where('user_id', auth()->id())
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                ->orWhere('company', 'like', "%$query%")
                ->orWhere('phone', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%");
            })
            ->paginate(10);
        
        if ($request->ajax()) {
            return view('partials.contacts', compact('contacts'))->render();
        }
        
        return view('dashboard', compact('contacts'));
    }
}
