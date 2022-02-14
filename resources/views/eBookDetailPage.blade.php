@extends('template')
@section('content')
    <div class="card mx-auto p-3">
        <u>{{__('eBookDetailPage.eBookDetail')}}</u>
        <br><br>
        {{__('eBookDetailPage.title')}}:  {{$book[0]->title}}
        <br><br>
        {{__('eBookDetailPage.author')}}: {{$book[0]->author}}
        <br><br>
        {{__('eBookDetailPage.description')}}: {{$book[0]->description}}
        <br><br>
        <div class=" d-flex justify-content-end">
            <form action="{{route('Add Cart Item', ['id' => $book[0]->ebook_id, 'lang'=>$lang])}}" method="POST">
                @csrf
                <button class="btn btn-warning" type="submit">{{__('eBookDetailPage.rent')}}</button>
            </form>
        </div>
    </div>
    @endsection