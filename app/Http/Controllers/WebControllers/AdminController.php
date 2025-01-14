<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('this is working');

        $admins = Admin::all();

        return view('user.users', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('this is working');
        return view('user.user-register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRegisterRequest $request)
    {
        $imagePath = $request->file('image')->store('images', 'public');

        $validated = $request->validated();

        $validated['image'] = $imagePath;

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

        return view('user.user-profile',['admin' => $admin]);
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

        return view('user.user-edit',['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request)
    {
        $data = $request->validated();

        $admin = Admin::find($request->id);

        if ($request->hasFile('image')) {
            if ($admin['image']) {
                Storage::delete($admin['image']);
            }
            $admin['image'] = $request->file('image')->store();
        }

        foreach($data as $key => $value){
            if($value){
                $admin->$key = $value;
            }
        }

        $admin->save();

        return back()->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminDeleteRequest $request)
    {
        // dd('this funtion is working');

        $admin = Admin::find($request->validated()['id']);

        // dd($admin);

        $admin->delete();

        return redirect('/users')->with('info','User has been deleted');
    }
}
