@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Subscriptions
                        <span class="pull-right">
                            <a href="{{route('admin.subscriptions.create')}}"
                               class=" btn btn-success btn-sm">Create New</a>
                        </span>
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Interval Time</th>
                                    <th>Coupon</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subscriptions as $subscription)
                                    <tr class="gradeX">
                                        <td>{{ $subscription->name ?? '-' }}</td>
                                        <td>{{ $subscription->price ?? '-' }}</td>
                                        <td>Per {{ $subscription->interval_time ?? '-' }}</td>
                                        <td>{{ $subscription->coupon ? $subscription->coupon->name : '-' }}</td>
                                        <td>
                                            @if($subscription->status == \App\Models\Subscription::Active)
                                                <span class="text-success">{{ ucwords($subscription->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($subscription->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ formattedDate($subscription->created_at) ?? '-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.subscriptions.edit',$subscription->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Interval Time</th>
                                    <th>Coupon</th>
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
@endsection
@section('script')
    <script>
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
    </script>
    {{--    here--}}
@endsection
