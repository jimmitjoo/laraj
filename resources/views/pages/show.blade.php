@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">

        <div class="col-xs-12">
            @if (Auth::user())
                <a href="{!! route('pages.edit', $page->id) !!}">{!! Lang::get('general.edit') !!}</a>
            @endif

            <h1>{!! $page->title !!}</h1>

            <time datetime="{!! $page->publish_raw_time !!}">{!! $page->publish_time !!}</time>

            <p>{!! $page->content !!}</p>

            @if ($page->parent)
                <h4>{!! Lang::get('general.parent') !!}</h4>
                <a href="{!! route('pages.show', $page->parent->id) !!}">{!! $page->parent->title !!}</a>
            @elseif ($page->children)
                <h4>{!! Lang::get('general.children') !!}</h4>
                @foreach ($page->children as $child)
                    <a href="{!! route('pages.show', $child->id) !!}">{!! $child->title !!}</a>
                @endforeach
            @endif
        </div>

    </div>

@endsection