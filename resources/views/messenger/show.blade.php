@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-8 ml-auto mr-auto">

                <div class="card">
                    <div class="card-header">
                        <h2 class="text-xl font-semibold leading-tight text-gray-800">
                            {{ $thread->subject }}
                        </h2>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($thread->messages as $message)
                                <div class="px-4 py-2 leading-relaxed border rounded-lg sm:px-6 sm:py-4">
                                    <strong>{{ $message->user->name }}</strong>
                                    <span class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}
                                    </span>
                                    <p class="text-sm">
                                        {{ $message->body }}
                                    </p>
                                </div>
                            @endforeach
                            </div>


                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 col-sm-12">

                                <form class="form" method="POST" action="{{ route('messages.update', $thread) }}" enctype="multipart/form-data"
                                >
                                @csrf
                                @method('PUT')
                                    <div class="card ">


                                        <div class="card-body ">
                                            <h4 class="title">Reply Message</h4>

                                            <div class="row">


                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        Message
                                                        <textarea rows="2" cols="80" class="form-control" placeholder="Add Reply..." name="message" ></textarea>

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






    <!-- end col-md-8 -->
</div>

<!-- Modal -->

@endsection

@section('scripts')

@endsection
