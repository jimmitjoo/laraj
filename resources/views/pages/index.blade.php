@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">

        <div class="col-xs-12">
            <h1>{!! Lang::get('general.list_pages') !!}</h1>

            <ul>
                @foreach ($pages as $page)
                    <li><a href="{!! route('pages.show', $page->id) !!}">{!! $page->title !!}</a></li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection