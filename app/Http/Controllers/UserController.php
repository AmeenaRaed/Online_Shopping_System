<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller{
    public function index() {
        $users = User::all(); // Fetch all users
        return view('admin.users', compact('users')); // Ensure it's passed correctly
    }
    
    
    
    public function destroy(User $user) {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'Access Denied');
        }
    
        if ($user->isAdmin() && User::where('role', 'admin')->count() === 1) {
            return redirect()->back()->with('error', 'You cannot delete the only admin.');
        }
    
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    
    public function store(Request $request) {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'Access Denied');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,supplier'
          
        ]);
        if (User::create($validated)){
        return redirect()->back()->with('success', 'User created successfully.');}
    }        
    
    public function update(Request $request, User $user) {
        if ($user->isCustomer()) {
            return redirect()->back()->with('error', 'Customers can only update their profile.');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
    
        $user->update($validated);
    
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    
    
}