<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

  public function index()
  {
    //Cantidad de Posts por usuarios.
    $users = User::withCount('posts')->take(12)->get();
    $data = [];
    foreach ($users as $user) {
      $data[$user->name] = $user->posts_count;
    }
    return view('admin.index', compact('data'));
  }
}
