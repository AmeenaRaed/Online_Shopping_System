<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller{
    public function index(Request $request) {
        $query = User::query();
    
        // Ensure correct column names for searching
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('username', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            });
        }
    
        // Apply role filter
        if ($request->filled('role') && $request->role !== 'all') {
            $query->where('role', $request->role);
        }
    
        $users = $query->paginate(10);
        return view('admin.users', compact('users'));
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