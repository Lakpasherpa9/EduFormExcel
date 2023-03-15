<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AdminPostModel; 

use App\Models\User; 

class AdminPostController extends Controller
{
    public function showPost(Request $request){

        $adminFields= $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
            $name=auth()->user()->name;
            $adminFields['AdminName']= $name;
            $adminFields['title']= strip_tags($adminFields['title']);
            $adminFields['body'] = strip_tags($adminFields['body']);

            //Using AdminPostModel 
            AdminPostModel::create($adminFields);
            // return "Your notice has been saved in the database with ID:".$adminFields['title'];
            return redirect()->route('adminpost');
    }

    // public function viewSinglePost($id){
    //     //return $id;
    //     return view('PostDashboard');
    // }

    public function singlePost(AdminPostModel $post){
       // return view('singlePost');
       return view('singlePost',['post'=>$post]);
    }

    public function createPost(){
        return view('adminpost');
    }

    public function postDashboard(AdminPostModel $posts){
        $posts = AdminPostModel::all();
return view('postDashboard', compact('posts'));
        // dd($posts);

    }
    public function destroy($id)
    {
        $post = AdminPostModel::findOrFail($id);
        $post->delete();
        return redirect()->route('postdashboard');
    }

    public function index()
    {
        $posts = AdminPostModel::all();
        return view('showposts', compact('posts'));
    }
}
