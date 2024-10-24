<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.manage_users', compact('users', 'permissions'));
    }

    public function assignPermissions(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
}
