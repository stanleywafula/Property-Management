@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Property Listings</p>
                                    <h4 class="card-title">{{ $properties->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Paid</p>
                                    <h4 class="card-title">{{ $payments->sum('amount') }}.00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> This Month
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-tag-content text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Due</p>
                                    <h4 class="card-title">{{ $bills->sum('amount') }}.00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> In the last month
                        </div>
                    </div>
                </div>
            </div>

        </div>

                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="card  card-tasks">
                                            <div class="card-header ">
                                                <h4 class="card-title">Work Orders</h4>
                                                <p class="card-category">Regular Maintenance</p>
                                            </div>
                                            <div class="card-body ">
                                                <div class="table-full-width">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                @foreach ($works as $work)
                                                                <td>
                                                                    <div class="form-check">

                                                                    </div>
                                                                </td>
                                                                <td><a href="{{ route('wordorders.show', $work->id) }}">{{ Str::limit($work->notes, 80) }}</a></td>
                                                                <td class="td-actions text-right">

                                                                </td>
                                                                @endforeach
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <hr>
                                                <div class="stats">
                                                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card  card-tasks">
                                            <div class="card-header ">
                                                <h4 class="card-title">Bills</h4>
                                                <p class="card-category">Outstanding Bills</p>
                                            </div>
                                            <div class="card-body ">
                                                <div class="table-full-width">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                @foreach ($bills as $bill)
                                                                <td>
                                                                    <div class="form-check">

                                                                    </div>
                                                                </td>
                                                                <td><a href="{{ route('bills.show', $bill->id) }}">{{ $bill->memo }}</a></td>
                                                                <td class="td-actions text-right">
                                                                    <strong>{{ $bill->amount }}</strong>
                                                                </td>
                                                                @endforeach
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <hr>
                                                <div class="stats">
                                                    <i class="now-ui-icons loader_refresh spin"></i> Updated 1 minute ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();

    });
</script>
@endsection
