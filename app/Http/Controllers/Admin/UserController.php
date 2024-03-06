<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = ['users' => $users];
        return view('admin.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $data = ['roles' => $roles];

        return view('admin.users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role_id'),
            'password' => Hash::make($request->get('password')),
            'category' => "invitation"
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $data = ['user' => $user, 'roles' => $roles];


        return view('admin.users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed']
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->fill($request->all())->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function loginAs(Request $request)
    {
        $user = User::where('email', '=', $request->get('email'))->first();
        Auth::login($user);

        return redirect()->route('login');
    }
}
