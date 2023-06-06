<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SuperAdmin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = SuperAdmin::all();
        return view('admin.admins.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:super_admins',
            'password' => 'required|min:6'
        ]);
        $admin = new SuperAdmin;
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admins');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = SuperAdmin::findOrFail($id);
        $title = 'Admin View';
        return view('admin.buildings.view', compact('model','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = SuperAdmin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => "required|unique:super_admins,username,$id",
            'password' => 'required|min:6'
        ]);
        $admin = SuperAdmin::findOrFail($id);
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
