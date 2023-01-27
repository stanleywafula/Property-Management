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

                        <form class="form" method="POST" action="{{  isset($work) ? route('wordorders.update', $work->id) : route('wordorders.store') }}" enctype="multipart/form-data"
                        >
                        @csrf
                        @if (isset($work))
                            @method('PUT')
                        @endif

                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">{{ isset($work) ? 'Update Work Order' : 'New Work Order' }}</h4>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" placeholder="Enter Subject" name="subject" value="{{ isset($work) ? $work->subject : '' }}">
                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                Property
                                                <select name="property_id" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                    @foreach ($properties as $property)
                                                        <option value="{{ $property->id }}"
                                                            @if (isset($work))
                                                            @if ($work->property_id == $property->id)
                                                                selected
                                                            @endif
                                                        @endif > {{ $property->property_name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                Tenant
                                                <select name="tenant_id" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                    @foreach ($tenants as $tenant)
                                                        <option value="{{ $tenant->id }}"

                                                            @if (isset($work))
                                                            @if ($work->tenant->id == $tenant->id)
                                                                selected
                                                            @endif
                                                        @endif
                                                        > {{ $tenant->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>







                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Category
                                                    <select name="category" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="Maintenance Request"
                                                            @if (isset($work))
                                                            @if ($work->category == "Maintenance Request")
                                                                selected
                                                            @endif
                                                        @endif> Maintenance Request
                                                            </option>
                                                            <option value="Complaint"
                                                            @if (isset($work))
                                                            @if ($work->category == "Complaint")
                                                                selected
                                                            @endif
                                                        @endif> Complaint
                                                        </option>
                                                        <option value="General Inquiry"
                                                        @if (isset($work))
                                                        @if ($work->category == "General Inquiry")
                                                            selected
                                                        @endif
                                                    @endif> General Inquiry
                                                        </option>
                                                        <option value="Other"
                                                        @if (isset($work))
                                                        @if ($work->category == "Other")
                                                            selected
                                                        @endif
                                                    @endif> Other
                                                        </option>

                                                    </select>


                                                </div>
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amount </label>
                                                    <input type="text" class="form-control" placeholder="Enter Amount " name="amount" value="{{ isset($work) ? $work->amount : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Charge to Work
                                                    <select name="charge" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="No"
                                                            @if (isset($work))
                                                            @if ($work->charge == "No")
                                                                selected
                                                            @endif
                                                        @endif> No
                                                            </option>
                                                            <option value="Yes"
                                                            @if (isset($work))
                                                            @if ($work->charge == "Yes")
                                                                selected
                                                            @endif
                                                        @endif> Yes
                                                        </option>


                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Entry Allowed
                                                    <select name="entry" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="No"
                                                            @if (isset($work))
                                                            @if ($work->entry == "No")
                                                                selected
                                                            @endif
                                                        @endif> No
                                                            </option>
                                                            <option value="Yes"
                                                            @if (isset($work))
                                                            @if ($work->entry == "Yes")
                                                                selected
                                                            @endif
                                                        @endif> Yes
                                                        </option>


                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Status
                                                    <select name="status" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="In Progress"
                                                            @if (isset($work))
                                                            @if ($work->status == "In Progress")
                                                                selected
                                                            @endif
                                                        @endif> In Progress
                                                            </option>
                                                            <option value="Completed"
                                                            @if (isset($work))
                                                            @if ($work->status == "Completed")
                                                                selected
                                                            @endif
                                                        @endif> Completed
                                                        </option>
                                                        <option value="Closed"
                                                        @if (isset($work))
                                                        @if ($work->status == "Closed")
                                                            selected
                                                        @endif
                                                    @endif> Closed
                                                        </option>

                                                        <option value="Defered"
                                                        @if (isset($work))
                                                        @if ($work->status == "Defered")
                                                            selected
                                                        @endif
                                                    @endif> Defered
                                                        </option>


                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    Priority
                                                    <select name="priority" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">

                                                            <option value="Low"
                                                            @if (isset($work))
                                                            @if ($work->priority == "Low")
                                                                selected
                                                            @endif
                                                        @endif> Low
                                                            </option>
                                                            <option value="Normal"
                                                            @if (isset($work))
                                                            @if ($work->priority == "Normal")
                                                                selected
                                                            @endif
                                                        @endif> Normal
                                                        </option>

                                                        <option value="High"
                                                        @if (isset($work))
                                                        @if ($work->priority == "High")
                                                            selected
                                                        @endif
                                                    @endif> High
                                                        </option>


                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6 ">

                                                <div class="form-group">
                                                    Due Date
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="due_date"  id="start_date" placeholder="Add Date" value="{{ isset($work) ?  $work->due_date : '' }}" />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    Notes
                                                    <textarea rows="2" cols="80" class="form-control" placeholder="Add  text..." name="notes" >{{ isset($work) ? $work->notes : '' }}</textarea>

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
