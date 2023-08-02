<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
   /* public function __construct()
    {
        //
    }*/
        /*Este metodo valida que no podamos entrar a post que no sean de nuestra audtoria */
 public function author(User $user, Post $post)
 {
     if($user->id == $post->user_id)
     {
        return true;
     }
    else
    {
        return false;
    }
 }
 /**El simbolo ? indica que el parametro User es opcional asi los usuarios no autenticados pueden ver los post */
 public function published(?User $user, Post $post)
 {
     if ($post->status == 2) {
        return true;
     }
     else
     {
         return false;
     }

 }
}
