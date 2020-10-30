@extends('backend.layout.master')
@section('content')
<h2><a href="{{route('backend.admin.create')}}" class="btn btn-danger">Add new Admin</a></h2>
<h2>Admin List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th class="bg-dark" style="width: 10px">SL</th>
            <th class="bg-dark" style="width: 40%">Name</th>
            <th class="bg-dark" style="width: 40%">Email</th>
            <th class="bg-dark" style="">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="{{ route('backend.admin.edit', $user->id) }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-pencil">Update</i>
                        </a>

                        <a href="{{ route('backend.admin.destroy', $user->id) }}"
                                class="btn btn-xs btn-danger"
                                onclick="delete_check({{$user->id}})"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </a>
                    </div>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>


@endsection

@push('js')
    <script type="text/javascript">
        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })
        }
    </script>
@endpush
