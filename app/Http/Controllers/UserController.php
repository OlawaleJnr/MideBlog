<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Followship;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return view('index', compact('posts'));
  }

  public function displayFindFriend()
  {
    // Get all Followers => Fetch the followers where the user1-id is not equals to the currently authenticated ID
    $followers = Followship::where('user2_id', Auth::guard('web')->user()->id)->get();
    // Get all users you are following =>  Fetch the users a currently authenticated user are following
    $followings = Followship::where('user1_id', Auth::guard('web')->user()->id)->get();
    // Get all Users
    $users = User::get();
    return view('find-friend', compact('followers', 'followings', 'users'));
  }

  public function searchFriend(Request $request)
  {
    $term = $request->term;
    $data = User::where('name', 'LIKE', '%' . $term . '%')->get();
    return response()->view('include.friend-search', compact('data', 'term'));
  }

  public function processFollowshipAction(Request $request)
  {
    if($request->action == "remove")
    {
      if(Followship::where('user1_id', '!=', Auth::guard('web')->user()->id)->where('user2_id', Auth::guard('web')->user()->id)->exists())
      {
        $data = Followship::where('user1_id', $request->user_id)->where('user2_id', Auth::guard('web')->user()->id)->first();
        $data->delete();
        $data = Followship::where('user1_id', '!=', Auth::guard('web')->user()->id)->where('user2_id', Auth::guard('web')->user()->id)->get();
        return response()->view('include.followers-refresh', compact('data'));
      }else {
        return response()->json(['data' => 'Unable to perfom the following request']);
      }
    }elseif ($request->action == "unfollow") {
      if(Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->exists())
      {
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id',  $request->user_id)->first();
        $data->delete();
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->get();
        return response()->view('include.following-refresh', compact('data'));
      }else {
        return response()->json(['data' => 'Unable to perfom the following request']);
      }
    }elseif ($request->action == "reload_friends") {
      $users = User::get();
      return response()->view('include.friend-reload', compact('users'));
    }elseif ($request->action == "follow") {
      // Remember user1 = the currently authenticated user id
      // While the user2 = the id of the peson we want to follow
      if (Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', $request->user_id)->exists()) {
        return response()->json(['data' => 'You cannot attempt to follow a user twice.']);
      }else {
        $data = new Followship();
        $data->user1_id = Auth::guard('web')->user()->id;
        $data->user2_id = $request->user_id;
        $data->save();
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->get();
        return response()->view('include.following-refresh', compact('data'));
      }
    }else {
      return response()->json(['data' => 'An error occured while trying to process your request']);
    }
  }
}
