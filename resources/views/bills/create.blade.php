@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css" rel="stylesheet"/>

@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="section-image" data-image="../assets/img/bg5.jpg" ;>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <form class="form" method="POST" action="{{  route('bills.store') }}" enctype="multipart/form-data"
                        >
                        @csrf

                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">New Bill</h4>

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                Tenant
                                                <select name="tenant_id" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                    @foreach ($tenants as $tenant)
                                                        <option value="{{ $tenant->id }}"
                                                            > {{ $tenant->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Memo</label>
                                                    <input type="text" class="form-control" placeholder="Enter Memo" name="memo">
                                                </div>
                                            </div>


                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Status
                                                    <select name="status" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="Not Paid"
                                                                selected> Not Paid
                                                            </option>

                                                    </select>


                                                </div>
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amount </label>
                                                    <input type="text" class="form-control" placeholder="Enter Amount " name="amount">
                                                </div>
                                            </div>

                                            <div class="col-md-6 ">

                                                <div class="form-group">
                                                    Due Date
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="due_date"  id="start_date" placeholder="Add Date"  />
                                                    </div>
                                                </div>
                                            </div>





                                    </div>



                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>

<script>
    flatpickr('#start_date',{
        enableTime:true
    });
</script>


<script>

    $(document).ready(function() {
    $('.users-selector').select2();
});
</script>




@endsection
