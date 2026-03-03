<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Show the edit form for the authenticated user's profile.
     */
    public function edit()
    {
        $user = Auth::user(); // Get the currently logged-in user
        return view('profile.edit', compact('user')); // Return the edit view with user data
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'password' => 'nullable|string|min:6|confirmed', // Optional password change
        ]);


        $user = Auth::user(); // Get the authenticated user


        // Update name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');


        // Handle profile image upload if provided
        if ($request->hasFile('profile_image')) {
            // Delete the old profile image if it exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }


            // Store the new profile image
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }


        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }


        // Save the changes
        $user->save();


        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        // Validate the user's password before deletion
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);


        $user = Auth::user(); // Get the authenticated user


        Auth::logout(); // Log out the user


        // Delete the user and their profile image (if any)
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }
        $user->delete();


        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')->with('status', 'Your account has been deleted.');
    }
}
