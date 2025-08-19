<?php

namespace App\Http\Controllers\Common;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\CourseStatus;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(private FileServiceInterface $fileService)
    {
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST')) {
            dd($request->all());
            Auth::user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);
            return redirect()->back()->with(['success' => 'Профил муваффақиятли тахрирланди']);
        } else {
            return view('pages.common.profile');
        }
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $this->fileService->upload(
            uploadedFile: $request->file('avatar'),
            type: FileType::USER_AVATAR->value,
            fileable: \auth()->user(),
            disk: 'wasabi',
            pathPrefix: FilePrefix::USER_AVATAR->value,
            replaceExisting: true
        );

        return redirect()->back()->with(['success' => 'Avatar uploaded successfully']);
    }

    public function deleteAvatar()
    {
        if (auth()->user()->avatar){
            $this->fileService->delete(auth()->user()->avatar);
        }

        return redirect()->back()->with(['success' => 'Avatar deleted successfully']);
    }
}
