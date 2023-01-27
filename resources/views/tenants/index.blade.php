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
                                    <i class="fa fa-home  text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Tenants</p>
                                    <h4 class="card-title">{{ $tenants->count() }}</h4>
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
                    <h4 class="card-title"> Tenants</h4>
                    <a href="{{ route('tenants.create') }}">
                        <button type="button" class="btn btn-wd btn-primary btn-outline pull-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            New Tenants
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
                                    <th>Full Name</th>
                                    <th>Apartment Number</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Files</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Full Name</th>
                                    <th>Apartment Number</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Files</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                <tr>
                                    <td></td>
                                    <td><a href="{{ route('tenants.show', $tenant->id) }}" >{{ $tenant->full_name }}</a>
                                    </td>

                                    <td>{{ $tenant->apartment_number }}</td>
                                    <td><a href="tel:{{ $tenant->mobile_phone }}" >{{ $tenant->mobile_phone }}</a></td>
                                    <td><a href="mail:{{ $tenant->email }}" >{{ $tenant->email }}</a></td>
                                    <td><a href="{{ asset('storage/'.$tenant->files) }}" target="_BLANK">Click here to open the file</a>
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
