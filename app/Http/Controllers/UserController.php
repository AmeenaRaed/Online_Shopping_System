<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller{
    public function index(Request $request) {
    $query = User::query();

    // Apply search
    if ($request->filled('search')) {
        $searchTerm = trim($request->search);
        $query->where('name', 'LIKE', "%{$searchTerm}%")
              ->orWhere('username', 'LIKE', "%{$searchTerm}%")
              ->orWhere('email', 'LIKE', "%{$searchTerm}%");
    }

    // Apply role filter properly
    if ($request->filled('role') && $request->role !== 'all') {
        $query->where('role', $request->role);
    }

    // Retrieve filtered users
    $users = $query->paginate(10);

    return view('admin.users', compact('users'));
}

    public function show($id) {
    $user = User::findOrFail($id);
    return response()->json($user);
}

    
    
    public function destroy(User $user) {
    if (!Gate::allows('isAdmin')) {
        abort(403, 'Access Denied');
    }

    // Prevent deletion of the last admin
    if ($user->isAdmin() && User::where('role', 'admin')->count() === 1) {
        return redirect()->back()->with('error', 'You cannot delete the only admin.');
    }

    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully.');
}

    
public function store(Request $request) {

    // Validate the form data
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'dob' => 'required|date',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users',
        'username' => 'required|string|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,supplier',
        'address' => 'nullable|string',
        'avatar' => 'nullable|image|max:2048',
    ]);

    // Encrypt the password
    $validated['password'] = bcrypt($validated['password']);

    // Handle avatar upload if provided
    if ($request->hasFile('avatar')) {
        $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    // Create the user
    User::create($validated);

    return redirect()->back()->with('success', 'User created successfully.');
}

        
    
    public function update(Request $request, User $user) {
    if ($user->role === 'customer') {
        return redirect()->back()->with('error', 'Customers can only update their profile.');
    }

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'dob' => 'required|date',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'username' => 'required|string|unique:users,username,' . $user->id,
        'role' => 'required|in:admin,supplier',
        'address' => 'nullable|string',
        'avatar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('avatar')) {
        $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    $user->update($validated);

    return redirect()->back()->with('success', 'User updated successfully.');
}

    
    
}