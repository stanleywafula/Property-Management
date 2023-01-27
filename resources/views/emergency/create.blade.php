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

                        <form class="form" method="POST" action="{{  route('econtacts.store') }}" enctype="multipart/form-data"
                        >
                        @csrf

                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">Add New Emergency Contact</h4>

                                    <div class="row">



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="full_name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email" name="email">
                                                </div>
                                            </div>


                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>Mobile Number </label>
                                                    <input type="tel" class="form-control"  placeholder="Add mobile number..." name="phone_number" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="display: none">

                                                <div class="form-group">
                                                    <label>User</label>
                                                    <select name="user_id" class="selectpicker" data-title=" Select" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"

                                                                    @if ( auth()->user()->id == $user->id)
                                                                        selected
                                                                    @endif

                                                                >
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
