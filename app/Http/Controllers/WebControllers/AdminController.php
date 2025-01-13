<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();

        return view('pages.users', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRegisterRequest $request)
    {
        $validated = $request->validated();

        $admin = new Admin($validated);

        $admin->save();

        return redirect('/users')->with('info','New admin has been granted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return back()->withErrors(['error' => 'User not found!']);
        }

        return view('pages.user-profile',['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return back()->withErrors(['error' => 'User not found!']);
        }

        return view('pages.user-edit',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request)
    {
        $data = $request->validated();

        $admin = Admin::find($request->id);

        foreach($data as $key => $value){
            $admin->$key = $value;
        }

        $admin->save();

        return back()->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $admin = Admin::find($request->id);

        $admin->destroy();

        return redirect('/users')->with('info','User has been deleted');
    }
}
