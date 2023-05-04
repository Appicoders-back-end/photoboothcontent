@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Sub Category {{ $categories->name }}
                        <span class="pull-right">
{{--                            <a href="{{route('admin.categories.create')}}" class=" btn btn-success btn-sm">Create New</a>--}}
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parent Category</th>
                                    {{--<th>Image</th>--}}
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sub_categories as $category)
                                    <tr class="gradeX">

                                        <td>{{ $category->name??'-' }}</td>
                                        <td>{{ $category->parent->name??'-' }}</td>
{{--                                        <td><img class="img img-fluid" width="80" style="height: 30px !important;" src="{{ asset('/'.$category->image) }}" alt=""></td>--}}
                                        <td>{{ date('F d, Y', strtotime($category->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form id="deleteform" action="{{ route('admin.categories.destroy', ['category'=>$category->id]) }}" method="POST">
                                               @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger delete-confirm"> <i class="fa fa-trash-o " id="delete_btn"></i></button>
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

    <div class="modal fade empty_data" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true" >
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on("click",'#read',function () {

            var str = $(this).data('id').length;

            if(str == 0){
                alert(typeof(str));
                $(".empty_data").css("display","none");
            }
            if (str >= 20){
                $("#read").css({"cursor":"pointer"});
            }
            $("#read_more").text($(this).data('id'));
        });

        $(document).ready(function () {
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
        });

    </script>
@endsection
