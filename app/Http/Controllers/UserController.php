<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,user',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'avatar'   => null,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name'  => 'required',
        'email' => 'required|email',
        'role'  => 'required',
        'avatar'=> 'nullable|image|max:2048',
    ]);

    $data = $request->only('name','email','role');

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    if ($request->hasFile('avatar')) {
        // hapus avatar lama
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $data['avatar'] = $request->file('avatar')
            ->store('avatars','public');
    }

    $user->update($data);

    return redirect()
        ->route('admin.users.index')
        ->with('success','User berhasil diperbarui');
}

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
