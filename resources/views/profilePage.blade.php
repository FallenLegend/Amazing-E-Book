@extends('template')
@section('content')
    <div class="card mx-auto p-3">
        <h2 class="text-center">{{__('profilePage.editProfile')}}</h2>
        <div class="d-flex justify-content-center">
            <img src="{{asset('storage/img/'.Auth::user()->display_picture_link)}}" width="400px" height="300px">
        </div>
        <form action="{{route('Update Profile', ['id' => Auth::user()->id, 'lang' => $lang])}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group d-flex justify-content-between p-2">
                <label for="first_name">{{__('profilePage.firstName')}}:</label>
                <input type="text" class="form-control mx-3 @error('first_name')" is-invalid @enderror" id="first_name" name="first_name" value="{{old('first_name')}}">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror

                <label for="middle_name">{{__('profilePage.middleName')}}:</label>
                <input type="text" class="form-control mx-3 @error('middle_name')" is-invalid @enderror" id="middle_name" name="middle_name" value="{{old('middle_name')}}">
                @error('middle_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror

                <label for="last_name">{{__('profilePage.lastName')}}:</label>
                <input type="text" class="form-control mx-3 @error('last_name')" is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name')}}">
                @error('last_name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group px-2 py-1">
                <label for="gender">{{__('profilePage.gender')}}</label>
                <div class="custom-control @error('gender') is-invalid @enderror" name="gender">
                    <input type="radio" name="gender" value="1" id="male"> {{__('profilePage.male')}}
                    <input type="radio" name="gender" value="2" id="female"> {{__('profilePage.female')}}
                    @error('gender')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group px-2 py-1">
                <label for="role_id">{{__('profilePage.role')}}: </label>
                @php
                if(Auth::user()->role_id==1) $role = 'Admin';
                else $role = 'User';
                @endphp
                <input type="text" name="role_id" value="{{$role}}" readonly>      
                    @error('role_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="email">{{__('profilePage.email')}}:</label>
                <input type="email" class="form-control @error('email')" is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group px-2 py-1">
                <label for="password">{{__('profilePage.password')}}:</label>
                <input type="password" class="form-control @error('password')" is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
           

            <div class="form-group px-2 py-1">
                <label for="display_picture_link">{{__('profilePage.displayPicture')}}:</label>
                <input type="file" class="form-control" id="display_picture_link" name="display_picture_link">
                @error('display_picture_link')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-center px-2 py-1">
                <button type="submit" class="btn btn-warning my-2">{{__('profilePage.save')}}</button>
            </div>
        </form>
    </div>
@endsection