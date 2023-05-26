@extends('layouts.main')

@section('content')
<div class="container">
    <div>Notification Count: {{auth()->user()->notifications->count()}}</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Total Money</th>
        </tr>
        </thead>
        <tbody>
        @foreach(auth()->user()->notifications as $notification)
            <tr>
                <th scope="row">1</th>
                <td>{{$notification->data['first_name']}}</td>
                <td>{{$notification->data['last_name']}}</td>
                <td>{{$notification->data['total_money']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
