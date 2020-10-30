@extends('backend.layout.master')
@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @foreach($result as $ConfigurationDataKey)

            <form method="POST" action="{{route('configuration.update',$ConfigurationDataKey->id)}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group invisible">
                        <label for="exampleInputPassword1">ID</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->id}}" name="id">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Name</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_name}}" name="company_name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Logo</label>
                        <input type="file" class="form-control" value="{{$ConfigurationDataKey->company_logo}}" name="company_logo">
                        <img class="mt-2" src="{{asset('images/'.$ConfigurationDataKey->company_logo)}}" alt="" style="width: 100px;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Email</label>
                        <input type="email" class="form-control" value="{{$ConfigurationDataKey->company_email}}" name="company_email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Description</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_description}}" name="company_description">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Title</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_title}}" name="company_title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Head Section Number</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_head_number}}" name="company_head_number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Footer Section Number</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_footer_number}}" name="company_footer_number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Address</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_address}}" name="company_address">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Map Code</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_map_code}}" name="company_map_code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Facebook Link</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_social_link_one}}" name="company_social_link_one">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Youtube Link</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_social_link_two}}" name="company_social_link_two">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Instagram Link</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_social_link_three}}" name="company_social_link_three">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Twitter Link</label>
                        <input type="text" class="form-control" value="{{$ConfigurationDataKey->company_social_link_four}}" name="company_social_link_four">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                @endforeach
            </form>
        </div>
    </div>








@endsection




@section('script')

    <script type="text/javascript">

        // getConfigurationData()
        //
        //     function getConfigurationData(){
        //         axios.get('/home/configuration/getAllData')
        //         .then(function (response){
        //             var jsonData = response.data
        //             if (response.status==200){
        //                 $.each(jsonData,function (i,item){
        //                     $('<tr>').html(
        //                         "<td>"+jsonData[i].id+"</td>"+
        //                         "<td>"+jsonData[i].company_name+"</td>"+
        //                         "<td>"+jsonData[i].company_logo+"</td>"+
        //                         "<td>"+jsonData[i].company_email+"</td>"+
        //                         "<td>"+jsonData[i].company_head_number+"</td>"+
        //                         "<td>"+jsonData[i].company_footer_number+"</td>"+
        //                         "<td>"+jsonData[i].company_address+"</td>"+
        //                         "<td>"+jsonData[i].company_map_code+"</td>"+
        //                         "<td>"+jsonData[i].company_social_link_one+"</td>"+
        //                         "<td>"+jsonData[i].company_social_link_two+"</td>"+
        //                         "<td>"+jsonData[i].company_social_link_three+"</td>"+
        //                         "<td>"+jsonData[i].company_social_link_four+"</td>"+
        //                         "<td><a class='CofigurationEditBtn' data-id="+jsonData[i].id+"  data-toggle='modal' data-target='#exampleModal'>Edit</a></td>"
        //                     ).appendTo('#CompanyTableID');
        //                 })
        //
        //                 $('.CofigurationEditBtn').click(function(){
        //                     var id = $(this).data('id');
        //                     $('#companyIdValue').html(id);
        //                 })
        //             }
        //             else {
        //                 alert('Something Went Wrong ! ')
        //             }
        //
        //         }).catch(function (error){
        //             alert('Something Went Wrong ! ')
        //         })
        //     }
        //
        //







    </script>

@endsection

