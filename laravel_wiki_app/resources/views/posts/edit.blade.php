@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        Editing post: <b> {{ $post->title }} </b>
                    </div>

                    <div class="card-body">


                        <!-- Form start !-->

                        <form action={{ route('posts.update', ['id' => $post->id ]) }} method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value={{ $post->title }} >
                            </div>

                            <div class="form-group">

                                <label for="cat">Category:</label>
                                <select class="form-control" id="cat" name="cat">
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}" @if($post->category == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3">
                                    {{ $post->content }}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-info">Save post</button>
                            <br><br>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>

                        <!-- Form end !-->
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection