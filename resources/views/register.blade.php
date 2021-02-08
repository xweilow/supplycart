@extends('layouts.master')

@section('content')

    <h2>Register</h2>
    @if (Session::has('message'))
       <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div>
        Have an account? Click here to <a href="/">login</a>.
    </div>
@endsection
