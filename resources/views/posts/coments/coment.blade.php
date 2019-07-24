<hr>



@if(auth()->check())

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif()

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('coment.store')}}" method="POST" class="form">
    {!! csrf_field() !!}

    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="form-group">
        <input type="text" name="title" placeholder="Título" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" placeholder="Comentário" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

@else

    <p>Precisa está logado para comentar. <a href="{{ route('login') }}">Clique aqui para entrar</a>

@endif

<hr>
<h3>Comentários ({{ $post->coments->count() }}) </h3>

@forelse($post->coments as $coment)
    <p>
        <b>{{$coment->user->name}} Comentou: </b>
        {{ $coment->title }} - {{ $coment->body }}
    </p>

@empty


@endforelse