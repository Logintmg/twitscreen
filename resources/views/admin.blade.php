@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('main.admin')}}</div>

                <div class="panel-body">
					@if (!empty($image_list))
						@foreach ($image_list as $image)
							@include('tweet_image', ['image' => $image])
						@endforeach
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

