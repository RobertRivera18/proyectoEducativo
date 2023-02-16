<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post)
    {
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }
    public function published(?User $user, Post $post)
    {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
    public function valued(User $user,Post $post){
        if(Review::where('user_id',$user->id)->where('post_id',$post->id)->count()){
          return false;
        }else{
          return true;
        }
  }

  public function revision(User $user, Post $post)
  {
      if ($post->status == 2) {
          return true;
      } else {
          return false;
      }
  }
}
