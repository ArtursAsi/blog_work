<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Cassandra\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{



    public function index()
    {
              $user = auth()->user();
              $posts = Post::ActivePosts()->orderBy('publish_date','desc')->paginate(20);
              return view('welcome',compact('posts','user'));
    }


    public function create()
    {
        $user = auth()->user();
        return view('auth.post.create',compact('user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $file = $request->file('picture');
        $date = $request['publish_date'];
        if($request->file('picture') == null)
        {
            $file = "";
        }
        else
        {
            $file = $request->file('picture')->store('/pictures');
        }

        if($request['active'] == 0)
        {
            $date = null;
        }
        else
        {
            $date = Carbon::now();
        }
        $user->posts()->create([
            'title' => $request['title'],
            'body' => $request['body'],
            'active' => $request['active'],
            'picture'=> $file,
            'publish_date'=> $date


        ]);

        return redirect(route('home'));
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->back();
    }

    public function target(Post $post)
    {
        $user = auth()->user();
        return view('auth.post.target', compact('post','user'));
   }

    public function show(Post $post)
    {
        $user = auth()->user();
        return view('auth.post.show', compact('post','user'));
    }

    public function edit(Post $post)
    {
        $user = auth()->user();
        return view('auth.post.edit', compact('post','user'));
    }

    public function update(Post $post, Request $request)
    {
        $user = auth()->user();
        $date = $request['publish_date'];

        if($request['active'] == 0)
        {
            $date = null;
        }
        else
        {
            $date = Carbon::now();
        }

            $post->update([
                'body' => $request['body'],
                'active' => $request['active'],
                'publish_date'=> $date


            ]);

            return redirect(route('home', compact('post','user')))->with('status',"Profile updated successfully !");
        }

    public function updatePicture(Post $post, Request $request)
    {

        if (isset($post->picture)) {
            Storage::delete($post->picture);

        }
        $picture = $request->file('picture')->store('/pictures');
        $post->update([
            'picture' => $picture
        ]);

        return redirect()->back()->with('picture',"Picture updated successfully !");
    }

    public function deletePicture(Post $post)
    {
        Storage::delete($post->picture);
        $post->update([
            'picture' => ""
        ]);

        return redirect()->back();
    }





}
