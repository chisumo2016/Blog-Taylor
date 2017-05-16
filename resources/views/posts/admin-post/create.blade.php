@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Create A Post</h1>

        <form method="POST" action="/posts">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="title" class="form-control" id="title" name="title" placeholder="Enter Title" >
            </div>
            <div class="form-group">
                <label for="body">Body </label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @include('partials.errors')
        </form>

    </div>

@endsection