@extends('master.master')

@section('title', 'Install Laraj')

@section('content')

    <div class="container">
        <div class="col-md-4 col-md-push-4">

            <h1>{!! Lang::get('general.installation.complete_cheer') !!}</h1>

            <hr>
            
            <a href="/auth/register" class="btn btn-lg btn-success">{!! Lang::get('general.create_admin_user') !!}</a>

        </div>
    </div>

@endsection