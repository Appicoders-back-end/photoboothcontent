@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Coupons
                        <span class="pull-right">
                            <a href="{{route('admin.coupons.create')}}" class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
{{--                                    <th>Code</th>--}}
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Video</th>
                                    <th>Images</th>
                                    <th>Documents</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($coupons as $coupon)
                                    <tr class="gradeX">
                                        <td>{{ $coupon->name??'N/A' }}</td>
{{--                                        <td>{{ $coupon->code??'N/A' }}</td>--}}
                                        <td>
                                            <p data-id="{{ $coupon->description }}" id="read" data-toggle="modal"
                                               data-target="#exampleModal3">
                                                {{ (strlen($coupon->description) > 20)?substr($coupon->description, 0, 20)." ... Read More
                                                ":$coupon->description??'N/A' }}
                                            </p>
                                        </td>
                                        <td>{{ $coupon->price??'N/A' }}</td>
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
                                        <td>{{ date('F d, Y', strtotime($coupon->created_at))??'N/A'}} </td>
                                        <td>
                                            <a href="{{ route('admin.coupons.edit',$coupon->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.coupons.destroy', ['coupon'=>$coupon->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> <i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
{{--                                    <th>Code</th>--}}
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Video</th>
                                    <th>Images</th>
                                    <th>Documents</th>
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

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog ">
            {{-- modal-dialog-centered--}}
            <div class="modal-content">
                <div class="modal-header newfqheading">
                    <h5 class="modal-title" id="exampleModalLabel">Category Description </h5>
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
    <script>
        $(document).on("click",'#read',function () {
            var str = $(this).data('id').length;
            if (str >= 20){
                $("#read").css({"cursor":"pointer"});
            }
            $("#read_more").text($(this).data('id'));
        });
    </script>
@endsection
