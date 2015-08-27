@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">
        <div class="content">

            <div class="title">{!! Lang::get('general.welcome') !!} {!! Auth::user()->name !!}!</div>

            <a href="/auth/logout" class="btn btn-default">{!! Lang::get('general.logout') !!}</a>

        </div>
    </div>

@endsection