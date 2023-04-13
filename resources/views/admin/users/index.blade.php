@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Users
                        <br>
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
                    </header>
                    <div class="card-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Status</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td>{{$user->first_name??'N/A'}}</td>
                                        <td>{{$user->last_name??'N/A'}}</td>
                                        <td>{{$user->email??'N/A'}}</td>
                                        <td>{{$user->phone??'N/A'}}</td>
                                        <td>
                                            <a href="{{ route('admin.users.changeStatus',$user->id) }}">
                                                <span
                                                    class="text-{{ ($user->status == 'active' ?'success':'danger') }}">{{ucwords($user->status)??'N/A'}}
                                                </span>
                                            </a>
                                        </td>
                                       {{-- <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary mr-2"
                                                   href="#"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-success mr-2"
                                                   href="#"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                            </div>
                                        </td>--}}
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
