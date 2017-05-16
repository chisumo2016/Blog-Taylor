@extends('layouts.master')
@section('content')
    <div class="col-sm-8">
        <h1>Sign In </h1>
        <form method="post" action="/login">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log In </button>
            </div>
            @include('partials.errors')
        </form>

    </div>
@endsection