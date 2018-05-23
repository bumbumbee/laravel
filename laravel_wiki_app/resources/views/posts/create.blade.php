@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        Create new post
                    </div>

                    <div class="card-body">
                        <!-- Form start !-->

                        <form action={{ route('posts.store') }} method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" >
                            </div>

                            <div class="form-group">
                                <label for="cat">Category:</label>

                                <select class="form-control" id="cat" name="cat[]" multiple>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>


                            </div>



                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3">
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Create Post</button>
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