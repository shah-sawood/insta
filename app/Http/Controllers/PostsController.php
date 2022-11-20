<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Type\VoidType;
use App\Models\Post;

class PostsController extends Controller
{

   /**
    * Require authenticated user before any post actions
    */

   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Display create a post page
    */

   public function create()
   {
      return view("posts.create");
   }

   /**
    * Create a post
    */

   public function store()
   {

      /**
       * Validate posted data
       */

      $data = request()->validate([
         'caption' => ['required', 'string'],
         'image' => ['required', 'image'],
      ]);

      /**
       * Save post to the database
       */

      $imagePath = request('image')->store('uploads', 'public');

      // resize the image to a 1200x1200 box
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
      $image->save();

      auth()->user()->posts()->create([
         'caption' => $data['caption'] ?? 'N/A',
         'image' => $imagePath ?? 'N/A',
      ]);

      return redirect('/profile/' . auth()->user()->id);
   }

   /**
    * Detail view of post
    */

   public function show(Post $post_id)
   {
      $post = $post_id;
      return view("posts.show", [
         'post' => $post,
      ]);
   }
}