@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        Create new category
                    </div>

                    <div class="card-body">
                        <!-- Form start !-->

                        <form action={{ route('cats.store') }} method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="number" class="form-control" id="position" name="position" value="1" >
                            </div>


                            <button type="submit" class="btn btn-success">Create Category</button>
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