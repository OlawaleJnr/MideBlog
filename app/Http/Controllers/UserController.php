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

  public function displayFindAuthors()
  {
    // Get all Followers => Fetch the followers where the user1-id is not equals to the currently authenticated ID
    $followers = Followship::where('user1_id', '!=', Auth::guard('web')->user()->id)->get();
    // Get all users you are following =>  Fetch the users a currently authenticated user are following
    $followings = Followship::where('user1_id', Auth::guard('web')->user()->id)->get();
    // Get all Users
    $users = User::get();
    return view('find-authors', compact('followers', 'followings', 'users'));
  }

  public function searchAuthor(Request $request)
  {
    $term = $request->term;
    $data = User::where('name', 'LIKE', '%' . $term . '%')->get();
    return response()->view('include.author-search', compact('data', 'term'));
  }
}
