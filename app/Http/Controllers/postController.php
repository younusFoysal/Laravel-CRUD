<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{
    public function index(){
      $posts =   post::get();

      return view('dashboard', compact('posts'));
    }

    public function addpost(){
        return view('addpost');
    }

    public function storepost(Request $request){
        $title = $request->title;
        $img = $request->file('img');

        $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        $img_url = 'upload/' . $img_name;

        $img->move(public_path('upload'), $img_name);

        post::insert([
            'title' => $title,
            'img_url' => $img_url,
        ]);

        return redirect()->route('dashboard');

    }

    public function deletepost($id){
        post::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function editpost($id){

        $post = post::where('id', $id)-> first();

        return view('editpost', compact('post'));
    }

    public function updatepost(Request $request){

        if($request->file('img')){
            $title = $request->title;
            $img = $request->file('img');

            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            $img_url = 'upload/' . $img_name;

            $img->move(public_path('upload'), $img_name);

            post::where('id', $postid)->update([
                'title' => $title,
                'img_url' => $img_url
            ]);

            return redirect()->route('dashboard');

        }
        else{
            $title = $request->title;
            $postid = $request->postid;

            post::where('id', $postid)->update([
                'title' => $title,

            ]);

            return redirect()->route('dashboard');



        }
    }
}
