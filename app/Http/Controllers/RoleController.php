<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->roles()->sync([$request->role_id]);
        return back()->with('success', 'Rol asignado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
