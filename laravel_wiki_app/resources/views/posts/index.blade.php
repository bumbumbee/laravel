@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{ $posts->links() }}

                <br>
                @forelse($posts as $post)
                    <div class="card mt-2">
                        <h5 class="card-header">{{ $post->title }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                {{ str_limit($post->content, 200) }}...
                            </p>
                            <a href={{ route('posts.show', ['id' => $post->id ]) }}>Read moar...</a> <br>
                            <small> {{ $post->created_at }} </small>

                            @auth
                                @can('edit', $post)
                                    <a href={{ route('posts.edit', ['id' => $post->id ]) }}>Edit post</a> <br>
                                    <!-- Marsruto posts.destroy metodas - DELTE
                                    todel tam, kad per forma paleisti toki metoda
                                    reikia formos metodo nurodyti - POST
                                    ir
                                    sukurti hidden laukeli, kurio name="_method"
                                    ir value="" medoto pavadinimas, kadangi metodas DELETE, todel
                                    value="delete". Marsruto metodus visada galime pasitikrinti
                                    su komanda - "php artisan route:list"
                                    -->
                                    <form action={{ route('posts.destroy', ['id' => $post->id ]) }} method="POST" >
                                        @csrf
                                        <input type="hidden" name="_method" value="delete" >
                                        <small>
                                            <button type="submit" class="alert alert-danger btn-sm"> Delete</button>
                                        </small>
                                    </form>
                                @endcan
                            @endauth
                        </div>
                    </div>
                @empty
                    <p>No posts... :-(</p>
                @endforelse

                <br>
                {{ $posts->links() }}

            </div>
        </div>
    </div>
@endsection