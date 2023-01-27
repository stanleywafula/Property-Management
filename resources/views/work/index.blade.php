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
                                    <i class="fa fa-briefcase  text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Work Orders</p>
                                    <h4 class="card-title">{{ $works->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>


        <div class="col-md-12">
            <div class="card data-tables">
                <div class="card-header ">
                    <h4 class="card-title"> Work Order</h4>
                    <a href="{{ route('wordorders.create') }}">
                        <button type="button" class="btn btn-wd btn-primary btn-outline pull-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            New Work Order
                        </button></a>
                </div>
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="fresh-datatables">
                        <table id="bootstrap-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Number</th>
                                    <th>Subject</th>
                                    <th>Apartment</th>
                                    <th>Apartment Number</th>
                                    <th>Status</th>
                                    <th>Priority</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Number</th>
                                    <th>Subject</th>
                                    <th>Apartment</th>
                                    <th>Apartment Number</th>
                                    <th>Status</th>
                                    <th>Priority</th>

                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($works as $work)
                                <tr>
                                    <td></td>
                                    <td><a href="@if (!auth()->user()->isTenant())
                                        {{ route('wordorders.show', $work->id) }}
                                    @endif">W00{{ $work->id }}</a></td>
                                    <td>{{ $work->subject }}</td>
                                    <td><a href="#" >{{ $work->tenant->property->property_name}}</a>
                                    </td>

                                    <td><a href="">{{ $work->tenant->apartment_number }}</a></td>
                                    <td>{{ $work->status }}</td>
                                    <td>{{ $work->priority }}</td>

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
                        </div>

@endsection

@section('scripts')
<script type="text/javascript">
    var $table = $('#bootstrap-table');

    function operateFormatter(value, row, index) {
        return [
            '<a rel="tooltip" title="View" class="btn btn-link btn-info table-action view" href="javascript:void(0)">',
            '<i class="fa fa-image"></i>',
            '</a>',
            '<a rel="tooltip" title="Edit" class="btn btn-link btn-warning table-action edit" href="javascript:void(0)">',
            '<i class="fa fa-edit"></i>',
            '</a>',
            '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
            '<i class="fa fa-remove"></i>',
            '</a>'
        ].join('');
    }

    $().ready(function() {
        window.operateEvents = {
            'click .view': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click view icon, row: ', info);
                console.log(info);
            },
            'click .edit': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click edit icon, row: ', info);
                console.log(info);
            },
            'click .remove': function(e, value, row, index) {
                console.log(row);
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });
            }
        };

        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,
            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 8,
            clickToSelect: false,
            pageList: [8, 10, 25, 50, 100],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>
@endsection
