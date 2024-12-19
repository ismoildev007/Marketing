<?php

namespace App\Http\Controllers\client\auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
        // Validatsiya
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Umumiy nom
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
            'responsible_person_name' => 'nullable|string|max:255', // Mas'ul shaxs ismi
            'type_of_activity' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'], // `name` Users jadvaliga ketadi
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'language_id' => 2, // Avtomatik ravishda language_id = 2
            'role_id' => 3,     // Avtomatik ravishda role_id = 3
        ]);

        if (!empty($validated['responsible_person_name'])) {
            $client = Client::create([
                'user_id' => $user->id, // Bog'lanishni ta'minlash uchun `user_id` saqlash
                'name' => $validated['responsible_person_name'], // Mas'ul shaxs ismi
                'phone_number' => $validated['phone_number'] ?? null,
                'type_of_activity' => $validated['type_of_activity'] ?? null,
            ]);
        }

        // Foydalanuvchini avtomatik login qilish
        Auth::login($user);

        return redirect()->route('client.dashboard')->with('success', 'User registered successfully!');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Hozirgi foydalanuvchini olish
        $client = $user->client; // Foydalanuvchi va Client modeli o'rtasidagi munosabat

        // Validatsiya
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'responsible_person_name' => 'required|string',
            'type_of_activity' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp.gif|max:4096',
            'password' => 'nullable|string|min:8',
        ]);
        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('clientImages', 'public');
        }

        // User modelni yangilash
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
        ]);

        // Client modelni yangilash
        if ($client) {
            $client->update([
                'image' => $path,
                'responsible_person_name' => $validated['responsible_person_name'],
                'type_of_activity' => $validated['type_of_activity'],
                'phone_number' => $validated['phone_number'],
            ]);
        }

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
