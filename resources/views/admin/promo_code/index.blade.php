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
                            <a href="{{route('admin.promo.create')}}" class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($promo_codes as $promo_code)
                                    <tr class="gradeX">
                                        <td>{{ $promo_code->name??'-' }}</td>
                                        <td>{{ $promo_code->code??'-' }}</td>
                                        <td>
                                            <img class="img img-fluid"
                                                 width="150"
                                                 src="{{ $promo_code->getImage() }}"
                                                 alt="{{$promo_code->name}}">
                                        </td>
                                        <td>{{ ucwords($promo_code->type)??'-' }}</td>
                                        <td>{{ $promo_code->amount??'-' }}</td>
                                        <td>
                                            <div class="col-md-3 mb-3">
                                                <form action="{{ route('admin.promo.changeStatus',$promo_code->id) }}" method="GET">
                                                    <select class="form-control mb-2" id="status" name="status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="inactive"
                                                                @if($promo_code->status == "inactive") selected @endif>
                                                            InActive
                                                        </option>
                                                        <option value="active"
                                                                @if($promo_code->status == "active") selected @endif>Active
                                                        </option>
                                                    </select>
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($promo_code->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.promo.edit',$promo_code->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <form action="{{ route('admin.promo.destroy',$promo_code->id) }}" id="deleteform" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" role="button" id="delete_btn"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                            {{--<a href="{{ route('admin.promo.destroy',['id'=>$promo_code->id]) }}"
                                               class="btn btn-danger"> <i class="fa fa-trash-o"></i></a> --}}
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
    <script>
        $(document).on('click','#delete_btn',function (e) {
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

        $(document).ready(function () {
            $(document).on('change', '#status', function () {
                this.form.submit();
            });
        });

    </script>
    {{--    here--}}
@endsection
