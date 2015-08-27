@extends('master.master')

@section('title', 'Laraj :: ' . Lang::get('general.version') . ': ' . getenv('LARAJ_VERSION'))

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Laraj</div>
            <p>{!! Lang::get('general.version') !!}: {!! getenv('LARAJ_VERSION') !!}</p>

            <form action="/install">
                <button class="btn btn-lg btn-success">{!! Lang::get('general.install') !!}</button>
            </form>
        </div>
    </div>
@endsection