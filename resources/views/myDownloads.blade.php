@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Downloads</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Date Downloaded</th>
                                    {{--<th>File Size</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($downloads as $download)
                                    <tr>
                                        <td>{{$download->content->name}}</td>
                                        <td>{{$download->content->type}}</td>
                                        <td>{{formattedDate($download->created_at)}}</td>
                                        {{--<td>5 MB</td>--}}
                                        <td><a href="{{$download->content->getImage()}}" download="{{$download->content->name}}">Download</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
