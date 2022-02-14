@extends('template')
@section('content')
    <div class="card mx-auto p-3">
        <h1><b><u>{{__('register.signUp')}}</b></u></h1>
        <br>
        <form action="{{route('Register Account',$lang)}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group d-flex justify-content-between p-2">
                <label for="first_name">{{__('register.firstName')}}:</label>
                <input type="text" class="form-control mx-3 @error('first_name')" is-invalid @enderror" id="first_name" name="first_name" value="{{old('first_name')}}">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="middle_name">{{__('register.middleName')}}:</label>
                <input type="text" class="form-control mx-3 @error('middle_name')" is-invalid @enderror" id="middle_name" name="middle_name" value="{{old('middle_name')}}">
                @error('middle_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror

                <label for="last_name">{{__('register.lastName')}}:</label>
                <input type="text" class="form-control mx-3 @error('last_name')" is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name')}}">
                @error('last_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group px-2 py-1">
                <label for="gender">{{__('register.gender')}}</label>
                <div class="custom-control @error('gender') is-invalid @enderror" name="gender">
                    <input type="radio" name="gender" value="1" id="male"> {{__('register.male')}}
                    <input type="radio" name="gender" value="2" id="female"> {{__('register.female')}}
                    @error('gender')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group px-2 py-1">
                <label for="role_id">{{__('register.role')}}: </label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach($roles as $role)
                        <option value="{{$role->role_id}}">{{$role->role_desc}}</option>
                    @endforeach
                </select>
                    @error('role')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="email">{{__('register.email')}}:</label>
                <input type="email" class="form-control @error('email')" is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="password">{{__('register.password')}}:</label>
                <input type="password" class="form-control @error('password')" is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="display_picture_link">{{__('register.displayPicture')}}:</label>
                <input type="file" class="form-control" id="display_picture_link" name="display_picture_link">
                @error('display_picture_link')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between px-2 py-1">
                <a href="{{route('login', $lang)}}">{{__('register.haveAccount')}}</a>
                <button type="submit" class="btn btn-warning my-2">{{__('register.submit')}}</button>
            </div>
        </form>
    </div>
@endsection
