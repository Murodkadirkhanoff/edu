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
            Auth::user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'specialization' => $request->specialization,
                'biography' => $request->biography,
            ]);
            return redirect()->back()->with(['success' => 'Профил муваффақиятли тахрирланди']);
        } else {
            return view('pages.common.profile');
        }
    }

    public function socialProfile(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'twitter_profile' => ['nullable', 'string', 'max:255'],
                'telegram_profile' => ['nullable', 'string', 'max:255'],
                'facebook_profile' => ['nullable', 'string', 'max:255'],
                'instagram_profile' => ['nullable', 'string', 'max:255'],
                'linkedin_profile' => ['nullable', 'string', 'max:255'],
                'youtube_profile' => ['nullable', 'string', 'max:255'],
            ]);

            $user = auth()->user();

            // updateOrCreate
            $user->socialProfile()->updateOrCreate(
                ['user_id' => $user->id],
                $data
            );

            return redirect()->back()->with('success', 'Ижтимоий тармоқ профиллари муваффақиятли сақланди!');
        } else {
            return view('pages.common.social_profiles');
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
        if (auth()->user()->avatar) {
            $this->fileService->delete(auth()->user()->avatar);
        }

        return redirect()->back()->with(['success' => 'Avatar deleted successfully']);
    }
}
