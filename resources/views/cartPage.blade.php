@extends('template')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12"> 
                <div class="py-4">
                    <h2>{{__('cartPage.myCart')}}</h2>
                </div>
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="table-warning">
                            <th>{{__('cartPage.title')}}</th>
                            <th>{{__('cartPage.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr class="table-warning">
                                <td>{{$book->title}}</td>
                                <td>
                                    <div class="d-flex inline mx-1">
                                        <form action="{{Route('Delete Cart Item', ['id' => $book->ebook_id, 'lang' => $lang])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">{{__('cartPage.delete')}}</button></a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>{{__('cartPage.noData')}}</tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection