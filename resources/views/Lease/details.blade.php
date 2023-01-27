@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-md-12 ml-auto mr-auto">
        <h4 class="card-title text-center" >{{ $lease->tenant->full_name }}   &nbsp;<a data-toggle="modal" href="#deleteModal"><i class="fa fa-trash"></i></a></h4>
        <br />

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lease</h4>
                        <a href="{{ route('leases.create') }}">
                            <button type="button" class="btn btn-wd btn-primary btn-outline pull-right">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                New Lease
                            </button></a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p >
                                        <span class="category">Name </span><a href="">{{ $lease->tenant->full_name }} </a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Mobile Number</span> <a href="tel:{{ $lease->tenant->mobile_phone }}">{{ $lease->tenant->mobile_phone }}</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Amount</span>{{ $lease->amount }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Period</span> {{ $lease->period }} </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Balance</span> {{ $lease->balance }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Apartment Number</span>
                                        {{ $lease->tenant->apartment_number }}
                                      </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="typo-line">
                                    <p>
                                        <span class="category">Apartment</span>
                                       {{ $lease->tenant->property->property_name }}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>






    <!-- end col-md-8 -->
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <form action="{{ route('leases.destroy', $lease->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="card">
                      Are you sure you want to delete this item?
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              </div>
            </div>
          </div>

    </form>
  </div>
@endsection

@section('scripts')

@endsection
