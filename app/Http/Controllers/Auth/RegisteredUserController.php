<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new user.
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }

        return view('auth.create.user');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name cannot exceed 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name cannot exceed 255 characters.',
            
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email cannot exceed 255 characters.',
            'email.unique' => 'This email address is already taken.',
            
            'password.required' => 'The password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.create.user')->with('success', 'User added successfully!');
    }

    /**
     * Show the form to editing the specified user.
     */
    public function edit(Request $request): View|RedirectResponse
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }

        $user = null;
        if ($request->has('user_id')) {
            $user = User::find($request->user_id);
        }

        $users = User::all();

        return view('auth.edit.user', compact('users', 'user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }

        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
            'role' => ['required', 'in:admin,site manager'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name cannot exceed 255 characters.',
            
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name cannot exceed 255 characters.',
            
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email cannot exceed 255 characters.',
            'email.unique' => 'This email address is already taken.',
            
            'password.required' => 'The password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role, 
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('auth.edit.user')->with('success', 'User updated successfully!');
    }

    /**
     * Display the users in the database to be deleted.
     */
    public function destroyPage()
    {
        $users = User::paginate(8);

        return view('auth.destroy.user', compact('users'));
    }

    /**
     * Delete the specified user in storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.destroy.user')->with('success', 'User deleted successfully.');
    }
}
