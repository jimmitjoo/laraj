@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="valign-container">
        <div class="content">

            <div class="title">{!! Lang::get('general.welcome') !!} {!! Auth::user()->name !!}!</div>

        </div>
    </div>

@endsection