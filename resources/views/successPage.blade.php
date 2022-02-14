@extends('template')
@section('content')
    <div class="text-center">
        <h1>{{__('successPage.success')}}!</h1>
        <a href="{{url('home', $lang)}}">{{__('successPage.home')}}</a>
    </div>
@endsection