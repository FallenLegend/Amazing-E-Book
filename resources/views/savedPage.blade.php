@extends('template')
@section('content')
    <div class="text-center">
        <h1>{{__('savedPage.saved')}}</h1>
        <a href="{{url('home', $lang)}}">{{__('savedPage.home')}}</a>
    </div>
@endsection