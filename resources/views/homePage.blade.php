@extends('template')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="table-warning">
                            <th>{{__('homePage.author')}}</th>
                            <th>{{__('homePage.title')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr class="table-warning">
                                <td>{{$book->author}}</td>
                                <td><a href="{{route('eBookDetailPage', ['id' => $book->ebook_id, 'lang' => $lang])}}">{{$book->title}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection