<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AdminPostModel; 

class AdminPostController extends Controller
{
    public function showPost(Request $request){

        $adminFields= $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
            $adminFields['title']= strip_tags($adminFields['title']);
            $adminFields['body'] = strip_tags($adminFields['body']);

            //Using AdminPostModel 
            AdminPostModel::create($adminFields);


            return "Your notice has been saved in the database with ID:".$adminFields['title'];

    }

    public function viewSinglePost($id){
        //return $id;
        return view('PostDashboard');
    }

    public function singlePost(AdminPostModel $post){
       // return view('singlePost');
       return view('singlePost',['post'=>$post]);
    }

    public function createPost(){
        return view('adminpost');
    }


}
