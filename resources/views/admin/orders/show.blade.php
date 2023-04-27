@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- invoice start-->
        <section>
            <div class="card card-primary">
                <!--<div class="card-heading navyblue"> INVOICE</div>-->
                <div class="card-body">
                    <div class="row invoice-list">
                        <div class="col-md-12 text-center corporate-id">
                            <img src="img/vector-lab.jpg" alt="">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>SHIPPING ADDRESS</h4>
                            <p>
                                Vector Lab<br>
                                Road 1, House 2, Sector 3<br>
                                ABC, Dreamland 1230<br>
                                P: +38 (123) 456-7890<br>
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>USER INFO</h4>
                            <ul class="unstyled">
                                <li>User Name: <strong>69626</strong></li>
                                <li>User Email: 2013-03-17</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>ORDER INFO</h4>
                            <ul class="unstyled">
                                <li>Order Number : <strong>69626</strong></li>
                                <li>Order Date : 2013-03-17</li>
                                <li>Due Date : 2013-03-20</li>
                                <li>Order Status : Paid</li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
{{--                            <th class="hidden-phone">Image</th>--}}
                            <th class="">Unit Cost</th>
                            <th class="">Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>LCD Monitor</td>
{{--                            <td class="hidden-phone">20 inch Philips LCD Black color monitor</td>--}}
                            <td class="">$ 1000</td>
                            <td class="">2</td>
                            <td>$ 2000</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-lg-4 invoice-block ">
                            <ul class="unstyled amounts">
                                <li><strong>Sub - Total amount :</strong> $6820</li>
                                <li><strong>Delivery Charges :</strong> -----</li>
                                <li><strong>Discount :</strong> 10%</li>
                                <li><strong>Grand Total :</strong> $6138</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center invoice-btn">
                        <a class="btn btn-danger text-light"><i class="fa fa-check"></i> Submit Invoice </a>
                        <a class="btn btn-info text-light" onclick="javascript:window.print();"><i
                                class="fa fa-print"></i> Print </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- invoice end-->
    </section>
@endsection
