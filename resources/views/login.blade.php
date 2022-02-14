@extends('template')
@section('content')
    <div class="card mx-auto p-3">
        <form action="{{route('Authenticate', $lang)}}" method="POST">
            @csrf
            <h1><u>{{__('login.login')}}</u></h1>
            <div class="form-group p-2">
                <label for="email">{{__('login.email')}}:</label>
                <input type="email"class="form-control @error('email')" is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <label for="password">{{__('login.password')}}:</label>
                <input type="password"class="form-control @error('password')" is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('signUp', $lang)}}">{{__('login.haveAccount')}}</a>
                <button type="submit" class="btn btn-warning">{{__('login.login')}}</button>
            </div>
        </form>
    </div>
@endsection