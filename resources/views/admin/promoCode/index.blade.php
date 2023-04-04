@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Users
                        <span class="pull-right">
                            <a href="{{route('admin.promo.create')}}" class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <strong>Success!</strong>
                                <?= htmlentities(Session::get('success'))?>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <strong>Error!</strong>
                                <?= htmlentities(Session::get('error'))?>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <p><strong>Whoops!</strong> Please correct errors and try again!</p>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th> Amount</th>
                                    <th> Status</th>
                                    <th> Image</th>
                                    <th> Created At</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($promo_codes as $promo_code)
                                    <tr class="gradeX">
                                        <td>{{ $promo_code->name??'N/A' }}</td>
                                        <td>{{ $promo_code->code??'N/A' }}</td>
                                        <td>{{ ucwords($promo_code->type)??'N/A' }}</td>
                                        <td>{{ $promo_code->amount??'N/A' }}</td>
                                        <td>
                                            @if($promo_code->status == "active")
                                                <span class="text-success">{{ ucwords($promo_code->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($promo_code->status) }}</span>
                                            @endif
                                        </td>
                                        <td><img class="img img-fluid" width="80" style="height: 30px !important;" src="{{ asset('admin_assets\img\promo-codes/'.$promo_code->image) }}" alt=""></td>
                                        <td>{{ date('F d, Y', strtotime($promo_code->created_at))??'N/A'}} </td>
                                        <td>
                                            <a href="{{ route('admin.promo.edit',['id'=>$promo_code->id]) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{ route('admin.promo.destroy',['id'=>$promo_code->id]) }}" class="btn btn-danger"> <i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th> Amount</th>
                                    <th> Status</th>
                                    <th> Image</th>
                                    <th> Created At</th>
                                    <th> Action</th>
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
