@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">PAYMENTS OVER TIME </h4>
                            <p class="card-category">Line Chart</p>
                        </div>
                        <div class="card-body ">
                            {!! $chart1->renderHtml() !!}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Charting library -->
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<!-- Your application script -->

{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}


@endsection
