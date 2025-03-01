<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Utils\Permissions;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Get all roles.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Edit role.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Role $role): \Illuminate\Contracts\View\View
    {
        $permissions = Permissions::$flags;
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Create role.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $permissions = Permissions::$flags;
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store role.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);
        Role::create([
            'name' => $request->name,
            'permissions' => Permissions::create(array_push($request->permissions, 'ADMINISTRATOR')),
        ]);
        return redirect()->route('admin.roles')->with('success', 'Role created successfully');
    }

    /**
     * Update role.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);
        $role->update([
            'name' => $request->name,
            'permissions' => Permissions::create(array_push($request->permissions, 'ADMINISTRATOR')),
        ]);
        return redirect()->route('admin.roles')->with('success', 'Role updated successfully');
    }
}
