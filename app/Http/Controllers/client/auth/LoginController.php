<?php

namespace App\Http\Controllers\client\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showClientLoginForm()
    {
        return view('client.auth.login.index');
    }

    public function clientLogin(Request $request)
    {
        return $this->clientLoginHandler($request);
    }

    protected function clientLoginHandler(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Client role_id = 3 ni tekshirish
        if (Auth::attempt(array_merge($credentials, ['role_id' => 3]))) {
            $request->session()->regenerate();

            return redirect()->route('client.profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('client.auth.register.index'); // Register sahifasi
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'organization_name' => 'required|string|unique:users,organization_name|max:255',
            'type_of_activity' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Foydalanuvchini yaratish
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'organization_name' => $validated['organization_name'],
            'type_of_activity' => $validated['type_of_activity'],
            'password' => Hash::make($validated['password']),
            'language_id' => 2, // Avtomatik ravishda language_id = 2
            'role_id' => 3,     // Avtomatik ravishda role_id = 3
        ]);

        // Foydalanuvchini avtomatik login qilish
        Auth::login($user);

        // Redirect qilish
        return redirect()->route('client.dashboard')->with('success', 'Registration successful!');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Hozirgi foydalanuvchini olish

        // Validatsiya
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Email foydalanuvchidan boshqa hech kimniki bo'lmasligi kerak
            'phone_number' => 'required|string|max:20',
            'organization_name' => 'required|string|unique:users,organization_name,' . $user->id,
            'type_of_activity' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Parol ixtiyoriy
        ]);

        // Ma'lumotlarni yangilash
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'organization_name' => $validated['organization_name'],
            'type_of_activity' => $validated['type_of_activity'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password, // Agar yangi parol kiritilgan bo'lsa, uni yangilash
        ]);

        // Profilni yangilash muvaffaqiyatli bo'lganidan keyin sahifani qayta yuklash
        return redirect()->route('client.profile')->with('success', 'Profil muvaffaqiyatli yangilandi!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }
}
