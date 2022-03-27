@extends('frontend.layouts.master')
@section('content')
    <div class="container">

        <table class="table display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Title</th>
                    <th>Provider Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($orderrequest as $item)
                 <tr>
                     <td>{{ ++$i }}</td>
                     <td>{{ $item->workorder->order_title }}</td>
                     <td>{{ $item->user_name->name }}</td>
                     <td>{{ $item->amount }}</td>
                     <td>{{ $item->status }}</td>
                 </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection