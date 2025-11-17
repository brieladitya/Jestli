<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $posts = Post::where('caption', 'like', "%{$q}%")->get();
        $users = User::where('name', 'like', "%{$q}%")->get();

        return view('search.index', compact('q', 'posts', 'users'));
    }
}
