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

                        <form class="form" method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data"
                        >
                        @csrf
                            <div class="card ">


                                <div class="card-body ">
                                    <h4 class="title">New Message</h4>

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                Recepient
                                                <select name="recipient" class="selectpicker" id="contact_id" data-title=" Select Contact" data-style="btn-default btn-outline btn-sm" data-menu-style="dropdown-blue">
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                Subject
                                                <input type="text" class="form-control"  placeholder="Subject" value="" name="subject">
                                            </div>
                                        </div>

                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                Message
                                                <textarea rows="2" cols="80" class="form-control" placeholder="Add  message..." name="message" ></textarea>

                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-info btn-fill pull-right">Send</button>
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
