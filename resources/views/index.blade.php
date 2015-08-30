@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="valign-container">
        <div class="content">

            <div class="title">{!! getenv('SITENAME') !!}</div>
            <p>Laraj {!! Lang::get('general.version') !!}: {!! getenv('LARAJ_VERSION') !!}</p>

            @if (!Auth::user())
            <a href="/auth/login" class="btn btn-lg btn-success">{!! Lang::get('general.login') !!}</a>
            @endif
        </div>
    </div>

@endsection