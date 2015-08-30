@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">

        <div class="col-xs-12">
            <h1>{!! $page->title !!}</h1>

            <time datetime="{!! $page->publish_raw_time !!}">{!! $page->publish_time !!}</time>

            <p>{!! $page->content !!}</p>
        </div>

    </div>

@endsection