@extends('admin.layouts.app')
@section('style')
    <style>
        .btn-design {
            float: left;
            margin-right: 12px;
        }

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
                                        <td><a href="#myModal"  data-id="{{ $video->getImage() }}" id="video_content" data-toggle="modal">
                                            <img class="img img-fluid img-design"
                                                 src="{{ $video->getThumbnailImage() }}"
                                                 alt="{{$video->name}}" >
                                            </a>
                                        </td>
{{--                                        <td><img class="img img-fluid" width="150" src="{{ $video->getImage() }}" alt="{{$video->name}}"></td>--}}
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
                                               class="btn btn-success btn-design"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.content_videos.destroy',$video->id) }}"
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

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Video</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="contentVideo" class=" embed-responsive embed-responsive-16by9">
                        <video id="video-10" controls>
                            <source src="" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>


        // http://localhost/photoboothcontent/public/storage/uploads/content_store/videos/thumbnail_images/1681116207_22890826_6641173.jpg

        $(document).on("click",'#video_content',function () {
            // var src = $(this).data('id');
           /* var video = $("#video-10");
            video.find("source").attr("src", src);
            video.get().load();
            video.get().play();
            alert(src)*/

            const videoSource = $(this).data('id');
            // alert(videoSource)
            $('video source').attr('src', videoSource)
            $('video')[0].load()
        });


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
