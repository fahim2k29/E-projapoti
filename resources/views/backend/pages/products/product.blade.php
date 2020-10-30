@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>MRP Price</th>
                <th>Wholesale Price</th>
                <th>Corporate Price</th>
                <th>Special Wholesale</th>
                <th>Special Corporate</th>
                <th>Discount (%)</th>
                <th>Has Offer</th>
                <th>Quantity</th>
                <th>Product Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pro_category->name }}</td>
                <td>{{ $product->mrp_price }}</td>
                <td>{{ $product->business_price }}</td>
                <td>{{ $product->corporate_price }}</td>
                <td>@if($product->wholesaleCheck == 1) Special Product @elseif($product->wholesaleCheck == 0) Not Special  @endif</td>
                <td>@if($product->corporateCheck == 1) Special Product @elseif($product->corporateCheck == 0) Not Special  @endif</td>
                <td>{{ $product->discount_price }}%</td>
                <td>
                    @if($product->has_offer == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->product_code }}</td>
                <td>
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle">
                            <i class="ace-icon fa fa-cog"></i>
                            <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-danger custom-dropdown-position">
                            <li>
                                <a href="{{ route('product.singleDetails',$product->id) }}"><icon class="ace-icon fa fa-pencil-square-o"></icon> Edit</a>

                            </li>

                            <li>
                                <a href="{{ route('product.delete',$product->id) }}"><icon class="ace-icon glyphicon glyphicon-trash"></icon> Delete</a>
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
