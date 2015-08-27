@extends('master.master')

@section('title', 'Laraj :: ' . Lang::get('general.version') . ': ' . getenv('LARAJ_VERSION'))

@section('content')

    <div class="container">
        <div class="content">

            <div class="title">Laraj</div>
            <p>{!! Lang::get('general.version') !!}: {!! getenv('LARAJ_VERSION') !!}</p>

                <a href="/install/create" class="btn btn-lg btn-success">{!! Lang::get('general.install') !!}</a>

        </div>
    </div>

@endsection