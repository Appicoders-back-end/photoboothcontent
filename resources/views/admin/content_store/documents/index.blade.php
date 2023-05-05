@extends('admin.layouts.app')
@section('style')
    <style>
        .img-design {
            width: 100%;
            height: 100px;
            object-fit: contain;
        }
    </style>
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Content Store Documents
                        <span class="pull-right">
                            <a href="{{route('admin.content_documents.create')}}" class=" btn btn-success btn-sm">Create New</a>
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
                                    <th>Document</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($images as $document)
                                    <tr class="gradeX">
                                        <td>{{ $document->name??'-' }}</td>
                                        <td>
                                            <img class="img img-fluid img-design"
                                                 src="{{ $document->getThumbnailImage() }}"
                                                 alt="{{$document->name}}">
                                        </td>
                                        <td><a download="{{ $document->getImage() }}" href="{{$document->getImage() }}"
                                               title="{{ $document->name }}">Download</a>
                                        </td>
                                        <td>{{$document->category ? $document->category->name : null}}</td>
                                        <td>
                                            @if($document->status == "active")
                                                <span class="text-success">{{ ucwords($document->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($document->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($document->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.content_documents.edit',$document->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.content_documents.destroy',$document->id) }}"
                                                  id="deleteform"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger delete-confirm" role="button"
                                                        id="delete_btn"><i class="fa fa-trash-o "></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>


        $(document).ready(function () {
            $('.delete-confirm').click(function(event){
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "You want to Delete it!",
                    icon: "warning",
                    type: "warning",
                    buttons: ["Cancel","Yes!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });

        });


    </script>
    {{--    here--}}
@endsection
