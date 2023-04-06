@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Promo Codes
                        <span class="pull-right">
                            <a href="{{route('admin.content_images.create')}}" class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($images as $image)
                                    <tr class="gradeX">
                                        <td>{{ $image->name??'N/A' }}</td>
                                        <td>
                                            <img class="img img-fluid"
                                                 width="150"
                                                 src="{{ $image->getImage() }}"
                                                 alt="{{$image->name}}">
                                        </td>
                                        <td>{{ ucwords($image->type)??'N/A' }}</td>
                                        <td>{{ $image->amount??'N/A' }}</td>
                                        <td>
                                            @if($image->status == "active")
                                                <span class="text-success">{{ ucwords($image->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($image->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($image->created_at))??'N/A'}} </td>
                                        <td>
                                            <a href="{{ route('admin.promo.edit',$image->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.promo.destroy',$image->id) }}" id="deleteform"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" role="button"
                                                        id="delete_btn"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script>
        $(document).on('click', '#delete_btn', function (e) {
            e.preventDefault(false);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteform').submit();
                    Swal.fire(
                        'Deleted!',
                        'Promo code has been deleted successfully.',
                        'success'
                    )
                }
            });
        })
    </script>
    {{--    here--}}
@endsection
