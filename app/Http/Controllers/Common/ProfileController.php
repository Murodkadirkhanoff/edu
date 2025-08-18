<?php

namespace App\Http\Controllers\Common;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
     if ($request->isMethod('POST')) {
        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        return redirect()->back()->with(['success' => 'Профил муваффақиятли тахрирланди']);
     }else{
         return view('pages.common.profile');
     }
    }
}
