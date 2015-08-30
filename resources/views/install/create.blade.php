@extends('master.master')

@section('title', 'Install Laraj')

@section('content')

    <div class="valign-container">
        <div class="col-md-4 col-md-push-4">

            <h1 class="title">Laraj</h1>

            <p>{!! Lang::get('general.install') !!} {!! Lang::get('general.version') !!}
                : {!! getenv('LARAJ_VERSION') !!}</p>

            @include('errors.display')

            <div class="alert alert-info">
                <p>{!! Lang::get('general.installation.need_correct_credentials_message') !!}</p>
            </div>

            <form action="/install" method="post">

                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="SITENAME">{!! Lang::get('general.sitename') !!}</label>
                    <input class="form-control" type="text" id="SITENAME" name="SITENAME"
                           placeholder="{!! Lang::get('general.sitename') !!}">
                </div>
                <div class="form-group">
                    <label for="DB_HOST">{!! Lang::get('general.host') !!}</label>
                    <input class="form-control" type="text" id="DB_HOST" name="DB_HOST"
                           placeholder="{!! Lang::get('general.host') !!}">
                </div>
                <div class="form-group">
                    <label for="DB_DATABASE">{!! Lang::get('general.database') !!}</label>
                    <input class="form-control" type="text" id="DB_DATABASE" name="DB_DATABASE"
                           placeholder="{!! Lang::get('general.database') !!}">
                </div>
                <div class="form-group">
                    <label for="DB_USERNAME">{!! Lang::get('general.username') !!}</label>
                    <input class="form-control" type="text" id="DB_USERNAME" name="DB_USERNAME"
                           placeholder="{!! Lang::get('general.username') !!}">
                </div>
                <div class="form-group">
                    <label for="DB_PASSWORD">{!! Lang::get('general.password') !!}</label>
                    <input class="form-control" type="password" id="DB_PASSWORD" name="DB_PASSWORD"
                           placeholder="{!! Lang::get('general.password') !!}">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{!! Lang::get('general.connect') !!}">
                </div>
            </form>


        </div>
    </div>

@endsection