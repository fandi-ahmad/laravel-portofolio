<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;

class authController extends Controller
{
    function index() {
        return view('auth.index');
    }

    function redirect() {
        return Socialite::driver('google')->redirect();
    }

    function callback() {
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar;

        $cek = User::where('email', $email)->count();
        if($cek > 0) {
            $avatarFile = $id . ".jpg";
            $fileContent = file_get_contents($avatar);
            File::put(public_path("template/images/faces/$avatarFile"), $fileContent);

            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'avatar' => $avatarFile
                ],
            );
            Auth::login($user);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'Akun yang anda masukan tidak diizinkan masuk');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->to('auth');
    }
}
