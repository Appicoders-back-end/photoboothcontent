@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Products
                        <span class="pull-right">
                            <a href="{{route('admin.product.create')}}" class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $product)
                                    <tr class="gradeX">
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->stock??'' }}</td>
                                        <td>${{ number_format($product->price,2) }}</td>
                                        <td><img class="img img-fluid" style="height: 70px; object-fit: cover;"
                                                 src="{{ $product->getImages()[0] }}" alt=""></td>
                                        <td>{{ date('F d, Y', strtotime($product->created_at)) ?? '-' }} </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit',$product->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form
                                                action="{{ route('admin.product.destroy', ['product'=>$product->id]) }}"
                                                method="POST" id="deleteform">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-confirm" ><i class="fa fa-trash-o "></i></button>
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


        })



        $(document).on("click", '#read', function () {
            var str = $(this).data('id').length;
            if (str >= 20) {
                $("#read").css({"cursor": "pointer"});
            }
            $("#read_more").text($(this).data('id'));
        });
    </script>
@endsection
