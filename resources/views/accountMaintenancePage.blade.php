@extends('template')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12"> 
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="table-warning">
                            <th>{{__('accountMaintenancePage.account')}}</th>
                            <th>{{__('accountMaintenancePage.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accounts as $account)
                            <tr class="table-warning">
                                <td>{{$account->first_name}} {{$account->middle_name}} {{$account->last_name}} - {{$account->role_desc}}</td>
                                <td>
                                    <div class="d-flex inline mx-1">
                                        <button class="btn btn-warning">
                                            <a href="{{route('Edit Account', ['id' => $account->id, 'lang' => $lang])}}">{{__('accountMaintenancePage.updateRole')}}</a>
                                        </button>
                                        <form action="{{route('Delete Account', ['id' => $account->id, 'lang' => $lang])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">{{__('accountMaintenancePage.delete')}}</button></a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>{{__('accountMaintenancePage.noData')}}</tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection