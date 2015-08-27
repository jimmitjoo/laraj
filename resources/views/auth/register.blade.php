@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">
        <div class="col-md-4 col-md-push-4">

            <h1 class="title">{!! Lang::get('general.register_user') !!}</h1>

            @include('errors.display')

            <form action="/auth/register" method="post">

                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">{!! Lang::get('general.name') !!}</label>
                    <input class="form-control" type="text" id="name" name="name"
                           placeholder="{!! Lang::get('general.name') !!}">
                </div>
                <div class="form-group">
                    <label for="email">{!! Lang::get('general.email') !!}</label>
                    <input class="form-control" type="text" id="email" name="email"
                           placeholder="{!! Lang::get('general.email') !!}">
                </div>
                <div class="form-group">
                    <label for="password">{!! Lang::get('general.password') !!}</label>
                    <input class="form-control" type="password" id="password" name="password"
                           placeholder="{!! Lang::get('general.password') !!}">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{!! Lang::get('general.password_confirmation') !!}</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="{!! Lang::get('general.password_confirmation') !!}">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{!! Lang::get('general.register') !!}">
                </div>
            </form>


        </div>
    </div>


@endsection