<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'body'=> 'required|string|max:500',
        ];
        $message = ["required"=>' :attribute es requerido' ];

        $this->validate($request, $fields, $message);

        $post = Post::create([
            'user_id' => $request->get('user_id'),
            'service_id' => $request->get('service_id'),
            'body' => $request->get('body')
        ]);

        return back();
    }
}
