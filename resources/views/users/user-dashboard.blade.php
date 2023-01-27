@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">


    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center" style="text-transform: uppercase;"> {{ auth()->user()->name }} &nbsp;</h4>
                <br />

                <p class="text-center">Welcome to your Tenant dashboard</p>

        </div>
        <div class="card-body">
            <div class="col-md-12 ml-auto mr-auto">

                <div class="nav-container">
                    <ul class="nav nav-icons justify-content-center" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link" id="legal-info-tab" href="#events" role="tab" data-toggle="tab">
                                <i class="nc-icon nc-notification-70"></i>
                                <br> Payments
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="invoice-tab" href="#invoices" role="tab" data-toggle="tab">
                                <i class="nc-icon nc-paper-2"></i>
                                <br> Bills
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="invoice-tab" href="#payments" role="tab" data-toggle="tab">
                                <i class="nc-icon nc-money-coins"></i>
                                <br> Balances
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content">


                    <div class="tab-pane fade fade show active" id="events" aria-labelledby="info-tab">
                        <div class="card">



                            <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="fresh-datatables">
                                    <table id="bootstrap-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Payment Method</th>
                                                <th>Reciept</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Payment Method</th>
                                                <th>Reciept</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                            <tr>
                                                <td></td>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->date)->format('Y-m-d')  }}</td>
                                                <td>{{ $payment->payment_method }}</td>
                                                <td><a href="{{ asset('storage/'.$payment->files) }}" target="_BLANK">Click here to open the file</a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            @endforeach






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="invoices" aria-labelledby="info-tab">
                        <div class="card">


                            <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="fresh-datatables">
                                    <table id="bootstrap-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Paid</th>
                                                <th>Due</th>
                                                <th>Memo</th>
                                                <th>Tenant</th>
                                                <th>Amount</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Paid</th>
                                                <th>Due</th>
                                                <th>Memo</th>
                                                <th>Tenant</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($bills as $bill)
                                            <tr>
                                                <td></td>
                                                <td> @if ( $bill->status  == 'Not Paid')
                                                    <button class="btn btn-warning btn-wd">Due</button>
                                                    @else()
                                                    <button class="btn btn-default btn-wd">Paid</button>
                                                    @endif
                                                </td>

                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bill->due_date)->format('Y-m-d')  }}</td>
                                                <td>{{ $bill->memo }}</td>
                                                <td>{{ $bill->amount }}
                                                </td>

                                                <td></td>
                                            </tr>
                                            @endforeach






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="payments" aria-labelledby="info-tab">
                        <div class="card">

                            <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="fresh-datatables">
                                    <table id="bootstrap-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Apartment</th>
                                                <th>Apartment Number</th>
                                                <th>Period</th>
                                                <th>Balance</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Apartment</th>
                                                <th>Apartment Number</th>
                                                <th>Period</th>
                                                <th>Balance</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($leases as $lease)
                                            <tr>
                                                <td></td>
                                                <td><a href="#" >{{ $lease->tenant->property->property_name }}</a>
                                                </td>

                                                <td>{{ $lease->tenant->apartment_number }}</td>
                                                <td>{{ $lease->period }}</td>
                                                <td>{{ $lease->balance }}</td>

                                                <td></td>
                                            </tr>
                                            @endforeach






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>
                <!-- end tab card-body -->
            </div>
        </div>

    </div>
    </div>

    <!-- end col-md-8 -->
</div>








@endsection
