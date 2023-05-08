@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        User Inquiries
                        <span class="pull-right">
{{--                            <a href="{{route('admin.coupons.create')}}" class=" btn btn-success btn-sm">Create New</a>--}}
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               {{-- @forelse($coupons as $coupon)
                                    <tr class="gradeX">

                                        <td>{{ $coupon->name??'-' }}</td>
                                        <td>{{ $coupon->price??'-' }}</td>
                                        <td>{{ $coupon->number_of_video??'N/A' }}</td>
                                        <td>{{ $coupon->number_of_images??'N/A' }}</td>
                                        <td>{{ $coupon->number_of_documents??'N/A' }}</td>
                                        <td>
                                            @if($coupon->status == "active")
                                                <span class="text-success">{{ ucwords($coupon->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($coupon->status) }}</span>
                                            @endif
                                        </td>
                                        --}}{{--                                        <td>{{ $coupon->code??'-' }}</td>--}}{{--
                                        <td>{{ date('F d, Y', strtotime($coupon->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.coupons.edit',$coupon->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            --}}{{--<form action="{{ route('admin.coupons.destroy', ['coupon'=>$coupon->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> <i class="fa fa-trash-o"></i></button>
                                            </form> --}}{{--
                                        </td>
                                    </tr>
                                @empty
                                @endforelse--}}
                                @forelse($inquiries as $inquiry)
                                    <tr class="gradeX">
                                        <td>{{ $inquiry->name??'-' }}</td>
                                        <td>{{ $inquiry->email??'-' }}</td>
                                        <td>{{ formattedNumber($inquiry->phone)??'-' }}</td>
{{--                                        <td>{{ $inquiry->message??'-' }}</td>--}}
                                        <td>
                                            <p data-id="{{ $inquiry->message }}" id="read" data-toggle="modal"
                                               data-target="#inquiry_message">
                                                {{ (strlen($inquiry->message) > 20)?substr($inquiry->message, 0, 20)." ... Read More
                                                ":$inquiry->message??'-' }}
                                            </p>
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($inquiry->created_at))??'-'}} </td>
                                        <td>
                                            <a href="mailto:{{$inquiry->email}}"><span class="badge badge-success">Reply</span></a>
                                            <a href="{{ route('admin.inquiry.delete',$inquiry->id) }}" class="btn btn-danger btn-sm delete-confirm"><span class="fa fa-trash-o"></span></a>
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

    <div class="modal fade" id="inquiry_message" tabindex="-1" aria-labelledby="inquiry_message" aria-hidden="true">
        <div class="modal-dialog ">
            {{-- modal-dialog-centered--}}
            <div class="modal-content">
                <div class="modal-header newfqheading">
                    <h5 class="modal-title" id="exampleModalLabel">Inquiry Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body newfqbody">
                    <p id="read_more">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(function () {

            $(document).on("click",'#read',function () {
                var str = $(this).data('id').length;
                if (str >= 20){
                    $("#read").css({"cursor":"pointer"});
                }
                $("#read_more").text($(this).data('id'));
            });

            $('.delete-confirm').click(function (event) {
                event.preventDefault();
                var url = $(this).attr("href");
                swal({
                    title: "Are you sure?",
                    text: "You want to cancel it!",
                    icon: "warning",
                    type: "warning",
                    buttons: ["No","Yes!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;
                    }
                });
            });
        });

    </script>
@endsection
