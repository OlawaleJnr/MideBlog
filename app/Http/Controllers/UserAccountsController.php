<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use App\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.account.index');
    }

    /**
     * Update Profile Picture for user access.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(Request $request)
    {
        $data = $request->all();
        $rules = [
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            // not acceptable response
            return response()->json(['error' => $validator->errors()], 406);
        }else {
			// Checking if the request has file of picture
			if ($request->hasFile('picture')) {
				# code...
				// Fetch user original image and store in a avatar variable
				$avatar = time() . '_' . $request->picture->getClientOriginalName();

				// Call deleteOldAvatar Function
				$this->deleteOldAvatar();

				// Moving the avatar to a public folder inside the storage parent directory
				$request->picture->storeAs('images', $avatar, 'public');

				// get the currently authenticated user and then update the user avatar
                User::find(auth('web')->user()->id)->update(['picture' => $avatar]);

				// success response message
                return response()->json(['success' => 'Profile picture uploaded successfully', 'redirectTo' => route('user.account.settings')], 201);
			}else {
				// bad response message
				return  response()->json(['error' => 'An error occured while processing your upload request and the server is refusing to respond to it'], 403);
			}
		}
    }

	/**
     * Delete Previously Uploaded Avatar.
     *
     * @return \Illuminate\Http\Response
     */
	protected function deleteOldAvatar() {
        // Check if user has uploaded an avatar before
        if (auth('web')->user()->picture) {
            # code...
            Storage::delete('/storage/images/' . auth('web')->user()->picture);
        }
    }

    /**
     * Update Password Field in the account settings channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $data = $request->all();
        $rules = [
            'current-password' => ['required', new MatchOldPassword],
            'password' => 'required',
            'confirm-password' => 'required|same:password',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // not acceptable response
            return response()->json(['error' => $validator->errors()], 406);
        }else {
			// Update the new password
			User::find(auth('web')->user()->id)->update(['password' => bcrypt($data['password'])]);
			// success response message
            return response()->json(['success' => 'Password Updated Successfully'], 201);
		}
    }

	
	/**
     * Update Information Field in the account settings channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInformation(Request $request)
    {
		// grab the currently authenticated user_id
		$user = Auth::guard('web')->user()->id;
		
		// grab all data from the request
        $data = $request->all();
		$data['user_id'] = $user;
		
        $rules = [
            'bio' => 'required',
            'dob' => 'required',
            'country' => 'required',
			'website' => 'required',
			'mobileNumber' => 'required',
        ];
		
		// validate request body
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // not acceptable response
            return response()->json(['error' => $validator->errors()], 406); 
        }else {
			$findUser = Information::where('user_id', $user)->first();
			if($findUser == null){
				// Add User Information
				Information::create($data);
				// success response message
				return response()->json(['success' => 'User Information Added Successfully'], 201);
			}else{
				Information::where('user_id', $data['user_id'])->update($data);
				return response()->json(['success' => 'User Information Updated Successfully'], 201);
			}
		}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
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
    public function edit($id)
    {
        //
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
        //
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
