@extends('layouts.master')

@section('content')

    <h2>Log In</h2>

    @if (Session::has('message'))
       <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <div>
        Do not have an account? Click here to <a href="/register">register</a>.
    </div>

@endsection
