<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Package1;
use App\Models\Package2;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin.login');
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (
            Auth::guard('admin')->attempt($credentials)
        ) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $package1Count = Package1::count();
        $package2Count = Package2::count();
        $userCount = User::count();
        
        return view('admin.dashboard', compact('package1Count' , 'package2Count' , 'userCount'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // return redirect()->route('admin.login');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Prevent browser back button cache
        return response()
            ->redirectToRoute('admin.login')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('admin.profiles.profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profiles.edit-profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $authUser = Auth::user();
        $user = Admin::find($authUser->id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Password validation rules
            'current_password' => 'nullable|required_with:password|string|min:8',
            'password' => 'nullable|string|min:8|confirmed|different:current_password',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect']);
            }

            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }


    public function viewmemeber()
    {
        $member = User::Paginate(10);
        return view('admin.viewmember', compact('member'));
    }

    public function editMember($id)
    {
        $member = User::findOrFail($id);
        return view('admin.editmember', compact('member'));
    }

    public function updateMember(Request $request, $id)
    {
        $member = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        $member->update($request->all());
        return redirect()->route('admin.viewmember')->with('success', 'Member updated successfully');
    }

    public function deleteMember($id)
    {
        $member = User::findOrFail($id);

        $member->delete();
        return redirect()->route('admin.viewmember')->with('success', 'Member deleted successfully');
    }

}
