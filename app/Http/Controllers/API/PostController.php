<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController as ApiController;
use Validator;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class PostController extends ApiController
{

    public function index()
    {
        $Posts = Post::all();
        return $this->sendResponse(PostResource::collection($Posts), 'Posts fetched.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $Post = Post::create($input);
        return $this->sendResponse(new PostResource($Post), 'Post created.');
    }


    public function show($id)
    {
        $Post = Post::find($id);
        if (is_null($Post)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new PostResource($Post), 'Post fetched.');
    }


    public function update(Request $request, Post $Post)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $Post->title = $input['title'];
        $Post->description = $input['description'];
        $Post->save();

        return $this->sendResponse(new PostResource($Post), 'Post updated.');
    }

    public function destroy(Post $Post)
    {
        $Post->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
