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

        return view('pages.profile', ['admins' => $admins]);
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
        $adminData = $request->validated();

        $admin = new Admin($adminData);

        $admin->save();

        return redirect('/users')->with('info','New admin has been granted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        return view('pages.profile-detail',['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('pages.profile-edit',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request)
    {
        $result = $request->validated();

        $admin = new Admin($result);

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

        return redirect('/users')->with('info','Admin has been deleted');
    }
}
