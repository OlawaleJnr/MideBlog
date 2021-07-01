<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followship;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Get all Followers => Fetch the followers where the user1-id is not equals to the currently authenticated ID
    $followers = Followship::where('user2_id', Auth::guard('web')->user()->id)->get();
    // Get all users you are following =>  Fetch the users a currently authenticated user are following
    $following  = Followship::where('user1_id', Auth::guard('web')->user()->id)->get();
    // Get all the notification associated to a user
    $notification = Notification::where('user_id', Auth::guard('web')->user()->id)->get();
    return view('user.profile.index', compact('followers', 'following', 'notification'));
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
