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

                        <form class="form" method="POST" action="{{ isset($tenant) ? route('tenants.update', $tenant->id) : route('tenants.store') }}" enctype="multipart/form-data"
                        >
                        @csrf
                        @if (isset($tenant))
                            @method('PUT')
                        @endif

                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">New Tenant</h4>

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                Property of Residence
                                                <select name="property_id" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                    @foreach ($properties as $property)
                                                        <option value="{{ $property->id }}"
                                                            @if (isset($tenant))
                                                            @if ($property->id == $tenant->property_id)
                                                                selected
                                                            @endif
                                                        @endif> {{ $property->property_name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Apartment Number</label>
                                                <input type="text" class="form-control" placeholder="Enter Unit Number" name="apartment_number" value="{{ isset($tenant) ? $tenant->apartment_number : '' }}">
                                            </div>
                                        </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Tenant Name" name="full_name" value="{{ isset($tenant) ? $tenant->full_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Phone Nuber</label>
                                                    <input type="text" class="form-control" placeholder="Enter Address" name="mobile_phone" value="{{ isset($tenant) ? $tenant->mobile_phone : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ isset($tenant) ? $tenant->email : '' }}">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Security Deposit </label>
                                                    <input type="text" class="form-control" placeholder="Enter Amount of Security Deposit" name="security_deposit" value="{{ isset($tenant) ? $tenant->security_deposit : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 ">

                                                <div class="form-group">
                                                    Start Date
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="start_date"  id="start_date" placeholder="Add Date"  value="{{ isset($tenant) ? $tenant->start_date : '' }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($tenant))
                                        @if ($tenant->files != Null)
                                        <div class="col-md-8 ">

                                            <div class="form-group">

                                                <div class="form-group">




                                                    <button type="button" class="btn btn-wd btn-default btn-outline">
                                                        <span class="btn-label">
                                                            <i class="fa fa-file"></i>
                                                        </span>
                                                        <a href="{{ asset('storage/'.$tenant->files)  }}" target="_BLANK">View Current Lease</a>
                                                    </button>



                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif

                                            <div class="col-md-12 ">

                                                <div class="form-group">
                                                    {{ isset($tenant) ? 'Upload New Lease' : 'Upload Lease' }}

                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="files"  placeholder="Add File"  multiple/>
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
