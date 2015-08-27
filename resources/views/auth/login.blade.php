@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">
        <div class="col-md-4 col-md-push-4">

            <h1 class="title">{!! Lang::get('general.login') !!}</h1>

            @include('errors.display')

            <form action="/auth/login" method="post">
                {!! csrf_field() !!}
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
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> {!! Lang::get('general.remember_me') !!}
                    </label>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{!! Lang::get('general.login') !!}">
                </div>
            </form>



        </div>
    </div>


@endsection