<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('this is working');

        $admins = Admin::withoutTrashed()->get();

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

        return redirect('/users')->with('info', 'New admin has been granted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $admin = Admin::findOrFail($id);

            return view('user.user-profile', ['admin' => $admin]);

        } catch (ModelNotFoundException $e)
        {
            return redirect('/users')->with('error', 'Admin not found');

        } catch (Exception $e)
        {
            return redirect('/users')->with('error', 'Internal Error');
        }
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

        return view('user.user-edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request)
    {
        $data = $request->validated();

        $admin = Admin::find($request->id);

        if (!$admin) {
            return back()->with('error', 'Admin not found!');
        }

        if ($request->hasFile('image')) {
            if ($admin['image']) {
                Storage::delete($admin['image']);
            }
            $admin['image'] = $request->file('image')->store();
        }

        foreach ($data as $key => $value) {
            if ($value) {
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

        $admin = Admin::find($request->id);

        if (!$admin) {
            return back()->with('error', 'Admin not found!');
        }
        // dd($admin);

        $admin->delete();

        return redirect('/users')->with('info', 'User has been deleted');
    }

    public function trashedUsers()
    {

        $admins = Admin::onlyTrashed()->get();

        return view('user.trashed-users', ['admins' => $admins]);
    }

    public function restore($id)
    {

        $admin = Admin::onlyTrashed()->find($id);

        if (!$admin) {
            return back()->with('error', 'Admin not found!');
        }

        $admin->restore();

        return back()->with('info', 'Admin has been restore!');
    }

    public function forceDelete($id)
    {

        $admin = Admin::onlyTrashed()->find($id);

        if (!$admin) {
            return back()->with('error', 'Admin not found!');
        }

        $admin->forceDelete();

        return back()->with('info', 'Admin has been deleted permantely!');
    }

    public function createGenre($id, $genre_id)
    {

        $admin = Admin::withTrashed()->find($id);

        $admin->genres()->attach($genre_id, ['description' => 'genre created']);

        return true;
    }
}
