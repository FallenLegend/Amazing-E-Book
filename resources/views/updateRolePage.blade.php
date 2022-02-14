@extends('template')
@section('content')
    <div class="card mx-auto p-3">
        <h2>{{__('updateRolePage.editRole')}}</h2>
        <u>{{$targetAccount->first_name}} {{$targetAccount->middle_name}} {{$targetAccount->last_name}}</u> <br>
        <form action="{{route('Edit Account', ['id'=>$targetAccount->id, 'lang'=>$lang])}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="role_id">{{__('updateRolePage.role')}}: </label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach($roles as $role)
                        <option value="{{$role->role_id}}">{{$role->role_desc}}</option>
                    @endforeach
                </select>
                    @error('role')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
            <div class="d-flex justify-content-end pt-3"><button type="submit" class="btn btn-warning mb-2">{{__('updateRolePage.save')}}</button></div>
        </form>
    </div>
@endsection