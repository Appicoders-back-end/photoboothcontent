@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Content Store Videos
                        <span class="pull-right">
                            <a href="{{route('admin.content_videos.create')}}" class=" btn btn-success btn-sm">Create New</a>
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
                                @forelse($videos as $video)
                                    <tr class="gradeX">
                                        <td>{{ $video->name??'N/A' }}</td>
                                        <td>
                                            <img class="img img-fluid"
                                                 width="150"
                                                 src="{{ $video->getThumbnailImage() }}"
                                                 alt="{{$video->name}}">
                                        </td>
                                        <td><img class="img img-fluid"
                                                 width="150"
                                                 src="{{ $video->getImage() }}"
                                                 alt="{{$video->name}}">
                                        </td>
                                        <td>{{$video->category ? $video->category->name : null}}</td>
                                        <td>
                                            @if($video->status == "active")
                                                <span class="text-success">{{ ucwords($video->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($video->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($video->created_at))??'N/A'}} </td>
                                        <td>
                                            <a href="{{ route('admin.content_videos.edit',$video->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.content_videos.destroy',$video->id) }}"
                                                  id="deleteform"
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
