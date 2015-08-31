@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">

        <div class="col-xs-12">
            @if (Auth::user())
                <ul>
                    <li>
                        <a href="{!! route('pages.edit', $page->id) !!}">{!! Lang::get('general.edit') !!}</a>
                    </li>
                    <li>
                        <form action="{!! route('pages.destroy', $page->id) !!}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">{!! Lang::get('general.delete') !!}</button>
                        </form>
                    </li>
                </ul>
            @endif

            <h1>{!! $page->title !!}</h1>

            <time datetime="{!! $page->publish_raw_time !!}">{!! $page->publish_time !!}</time>

            <p>{!! $page->content !!}</p>

            @if ($page->parent)
                <h4>{!! Lang::get('general.parent') !!}</h4>
                <a href="{!! route('pages.show', $page->parent->id) !!}">{!! $page->parent->title !!}</a>
            @elseif (count($page->children) > 0)
                <h4>{!! Lang::get('general.children') !!}</h4>
                @foreach ($page->children as $child)
                    <a href="{!! route('pages.show', $child->id) !!}">{!! $child->title !!}</a>
                @endforeach
            @endif
        </div>

    </div>

@endsection