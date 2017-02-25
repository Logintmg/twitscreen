@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('main.get_pic')}}</div>

                <div class="panel-body">
					<a class="btn btn-default" href="{{route('main')}}" role="button">{{trans('main.go_back')}}</a> <br/>
					@include('tweet_image', ['image' => $tweet_image])
					<br/>
					
					<a class="btn btn-primary" href="{{route('download', 'filename=' . $tweet_image->filename)}}" role="button">{{trans('main.download')}}</a> <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

