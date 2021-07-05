<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Followship;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    // Get all the notification associated to a user
    if (Auth::guard('web')->check()) {
      $notification = Notification::where('user_id', Auth::guard('web')->user()->id)->get();
      return view('index', compact('posts', 'notification'));
    } else {
      $notification = "";
      return view('index', compact('posts', 'notification'));
    }
  }

  public function displayFindFriend()
  {
    // Get all Followers => Fetch the followers where the user1-id is not equals to the currently authenticated ID
    $followers = Followship::where('user2_id', Auth::guard('web')->user()->id)->get();
    // Get all users you are following =>  Fetch the users a currently authenticated user are following
    $followings = Followship::where('user1_id', Auth::guard('web')->user()->id)->get();
    // Get all the notification associated to a user
    $notification = Notification::where('user_id', Auth::guard('web')->user()->id)->get();
    // Get all Users
    $users = User::get();
    return view('find-friend', compact('followers', 'followings', 'users', 'notification'));
  }

  public function searchFriend(Request $request)
  {
    $term = $request->term;
    $data = User::where('name', 'LIKE', '%' . $term . '%')->get();
    return response()->view('include.friend-search', compact('data', 'term'));
  }

  public function processFollowshipAction(Request $request)
  {
    if ($request->action == "remove") {
      if (Followship::where('user1_id', '!=', Auth::guard('web')->user()->id)->where('user2_id', Auth::guard('web')->user()->id)->exists()) {
        $data = Followship::where('user1_id', $request->user_id)->where('user2_id', Auth::guard('web')->user()->id)->first();
        $data->delete();
        $data = Followship::where('user1_id', '!=', Auth::guard('web')->user()->id)->where('user2_id', Auth::guard('web')->user()->id)->get();
        return response()->view('include.followers-refresh', compact('data'));
      } else {
        return response()->json(['data' => 'Unable to perfom the following request']);
      }
    } elseif ($request->action == "unfollow") {
      if (Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->exists()) {
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id',  $request->user_id)->first();
        $data->delete();
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->get();
        return response()->view('include.following-refresh', compact('data'));
      } else {
        return response()->json(['data' => 'Unable to perfom the following request']);
      }
    } elseif ($request->action == "reload_friends") {
      $users = User::get();
      return response()->view('include.friend-reload', compact('users'));
    } elseif ($request->action == "follow") {
      // Remember user1 = the currently authenticated user id
      // While the user2 = the id of the peson we want to follow
      if (Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', $request->user_id)->exists()) {
        return response()->json(['data' => 'You cannot attempt to follow a user twice.']);
      } else {
        $notify = new Notification();
        $notify->user_id = $request->user_id;
        $notify->title = "New Message Received";
        $notify->content = "You have a new Follower";
        $notify->save();

        $data = new Followship();
        $data->user1_id = Auth::guard('web')->user()->id;
        $data->user2_id = $request->user_id;
        $data->save();
        $data = Followship::where('user1_id', Auth::guard('web')->user()->id)->where('user2_id', '!=', Auth::guard('web')->user()->id)->get();
        return response()->view('include.following-refresh', compact('data'));
      }
    } else {
      return response()->json(['data' => 'An error occured while trying to process your request']);
    }
  }

  public function refreshNotification()
  {
    // Get all the notification associated to a user
    $notification = Notification::where('user_id', Auth::guard('web')->user()->id)->get();
    return response()->json(['data' => $notification->count()]);
  }

  public function reloadFollowers()
  {
    // Get all Followers => Fetch the followers where the user1-id is not equals to the currently authenticated ID
    $data = Followship::where('user2_id', Auth::guard('web')->user()->id)->get();
    return response()->view('include.followers-refresh', compact('data'));
  }
}
