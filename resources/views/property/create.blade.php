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

                        <form class="form" method="POST" action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" enctype="multipart/form-data"
                        >
                        @csrf
                        @if (isset($property))
                            @method('PUT')
                        @endif

                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">New Property</h4>

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                What is the property type?
                                                <select name="property_type" class="selectpicker" id="property_type" data-title=" Select Property Type" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                    <option value="Residential"
                                                    @if (isset($property))
                                                            @if ($property->property_type == "Residential")
                                                                selected
                                                            @endif
                                                        @endif
                                                    >Residential</option>
                                                    <option value="Commercial"
                                                    @if (isset($property))
                                                    @if ($property->property_type == "Commercial")
                                                        selected
                                                    @endif
                                                @endif
                                                    >Commercial</option>

                                                </select>


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Enter " name="property_name"  value="{{ isset($property) ? $property->property_name : '' }}">
                                            </div>
                                        </div>





                                    </div>




                                    <div class="card-header ">
                                        <div class="card-header">
                                            <h4 class="card-title">What is the street address?</h4>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{ isset($property) ? $property->address : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" name="city" value="{{ isset($property) ? $property->city : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>County</label>
                                                <input type="text" class="form-control" placeholder="County" name="county" value="{{ isset($property) ? $property->county : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code" name="zip" value="{{ isset($property) ? $property->zip : '' }}">
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
    flatpickr('#date',{
        enableTime:true
    });
</script>


<script>

    $(document).ready(function() {
    $('.users-selector').select2();
});
</script>




@endsection
