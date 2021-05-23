<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\AdminUsersRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUsersRequest $request)
    {
        if (trim($request->password) == '') {
            // Fetch all request array data and store inside a variable data except password field
            $data = $request->except('password');
        }else{
            // Fetch all request array data and store inside a variable data
            $data = $request->all();

            // Hashing the password
            $data['password'] = bcrypt($request->password);
        }

        // Checking if the request has file of avatar_id
        if($request->hasFile('avatar_id')){
            // Fetch the user original filename
            $filename = $request->avatar_id->getClientOriginalName();

            // Moving the avatar to a public folder inside the storage parent directory
            $request->avatar_id->storeAs('images', $filename, 'public');

             // Using the avatar model to store the avatar filename inside the database
            $avatar = Avatar::create(['filename' => $filename]);

            // getting the avatar_id
            $avatar_id = $avatar->id;

            $data['avatar_id'] = $avatar_id;
        }

        // Storing User Information into the user db
        User::create($data);

        return redirect(route('users.index'));
    }

    /**$
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUsersRequest $request, User $user)
    {
        if (trim($request->password) == '') {
            // Fetch all request array data and store inside a variable data except password field
            $data = $request->except('password');
        }else{
            // Fetch all request array data and store inside a variable data
            $data = $request->all();

            // Hashing the password
            $data['password'] = bcrypt($request->password);
        }

        if($request->hasFile('avatar_id')){
            $filename = $request->avatar_id->getClientOriginalName();
            $request->avatar_id->storeAs('images', $filename, 'public');
            $avatar = Avatar::create(['filename' => $filename]);
            $avatar_id = $avatar->id;
            $data['avatar_id'] = $avatar_id;
        }

        $user->update($data);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        unlink(public_path() . $user->avatar->filename);
        $user->delete();
        Session::flash('deleted_user', 'The user with the name '.strtoupper($user->name).' has been Deleted');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $users = User::all();
        return view('admin.users.manage', compact('users'));
    }
}
