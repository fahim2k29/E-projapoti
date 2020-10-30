@extends('backend.layout.master')
@section('content')



    <div class="container" style="width: 100%">
        <h2>Customer Message</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ContactUs as   $key =>$ContactUs)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $ContactUs->name }}</td>
                    <td>{{ $ContactUs->email }}</td>
                    <td>{{ $ContactUs->phone }}</td>
                    <td>{{ $ContactUs->message }}</td>

                    <td><a href="{{ route('backend.contactus.msg.delete',$ContactUs->id) }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





@endsection





