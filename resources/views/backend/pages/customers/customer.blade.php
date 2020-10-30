@extends('backend.layout.master')
@section('content')



    <div class="container">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Customer Email</th>
                <th>Customer Type</th>
                <th>Customer Area </th>
                <th>Customer Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($allCustomers as $allCustomer)
                <tr>
                    <td>{{ $allCustomer->name }}</td>
                    <td>{{ $allCustomer->phone }}</td>
                    <td>{{ $allCustomer->email }}</td>
                    <td>@if($allCustomer->type == 1) Retail @elseif($allCustomer->type == 2)  Wholesale @elseif($allCustomer->type == 3) Corporate @endif</td>
                    <td>{{ $allCustomer->area }}</td>
                    <td>{{ $allCustomer->address }}</td>

                    <td>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle">
                                <i class="ace-icon fa fa-cog"></i>
                                <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-danger custom-dropdown-position">
                                <li>
                                    <a href="{{route('customers.update',$allCustomer->id)}}"><icon class="ace-icon fa fa-pencil-square-o"></icon> Edit</a>

                                </li>

                                <li>
                                    <a href="{{route('customers.delete',$allCustomer->id)}}"><icon class="ace-icon glyphicon glyphicon-trash"></icon> Delete</a>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>




@endsection
