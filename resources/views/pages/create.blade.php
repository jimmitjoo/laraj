@extends('master.master')

@section('title', getenv('SITENAME'))

@section('content')

    <div class="container">

        <div class="col-xs-12">
            <h1>{!! Lang::get('general.new_page') !!}</h1>
        </div>

        <form action="/pages" method="post">

            {!! csrf_field() !!}

            <div class="col-md-9">

                <input type="hidden" name="page_type" value="page">

                <div class="form-group">
                    <label for="title">{!! Lang::get('general.title') !!}</label>
                    <input class="form-control" type="text" id="title" name="title"
                           placeholder="{!! Lang::get('general.title') !!}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="15" name="content"
                              placeholder="{!! Lang::get('general.content') !!}"></textarea>
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="publish_at">{!! Lang::get('general.publish_at') !!}</label>

                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" id="publish_at" name="publish_at"
                               placeholder="{!! Lang::get('general.publish_at') !!}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="state">{!! Lang::get('general.state') !!}</label>
                    <select class="form-control" id="state" name="state">
                        <option value="draft">{!! Lang::get('general.draft') !!}</option>
                        <option value="scheduled">{!! Lang::get('general.scheduled') !!}</option>
                        <option value="published">{!! Lang::get('general.published') !!}</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="btn btn-lg btn-success" type="submit" value="{!! Lang::get('general.post') !!}">
                </div>

            </div>

        </form>

    </div>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@endsection