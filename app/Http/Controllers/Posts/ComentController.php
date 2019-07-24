<?php

namespace App\Http\Controllers\Posts;

use App\Notifications\PostComented;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComentFormRequest;

class ComentController extends Controller
{
    public function store(StoreComentFormRequest $request) {

        $coment = $request->user()->coments()->create($request->all());

        $author = $coment->post->user;
        $author->notify(new PostComented($coment));
        
        return redirect()->route('posts.show', $coment->post_id)->withSuccess('Comentário Cadastrado');
    }
}
