@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('main.title')}}</div>

                <div class="panel-body">
					@if (isset($error))
						<p class="bg-danger">{{trans('main.error')}}</p>
					@endif
				
					{!! Form::open(['route' => 'forma']) !!}
							<div>
							{{ Form::url('webpage', '', ['class' => 'form-control', 'placeholder' => trans('main.enter_url')]) }}
							</div>
							
							<div class="button-main">
								{{Form::submit(trans('main.submit'), ['class' => 'btn btn-primary'])}}
							</div>
					{!! Form::close() !!}
                    {!! Form::open(['route' => 'forma']) !!}
					<div class="image_list">

					    @if (!empty($image_list))
                            <h2>{{trans('main.previous_pic')}}</h2>
					    	@foreach ($image_list as $image)

						    	@include('tweet_image', ['image' => $image])

						    @endforeach
					    @endif
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

