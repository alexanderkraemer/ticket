@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">new Ticket</div>

                    <div class="panel-body">
                        {!! Form::open(['action' => 'TicketController@store']) !!}
                        <div class="form-body">
                            <div class="form-group col-md-12">
                                {!! Form::label('name', 'Titel', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('creator', 'Creator', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('creator', null, ['class' => 'form-control', 'placeholder' => 'Creator']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('priority_id', 'Priority', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::select('priority_id', $priority, 3, ['class' => 'form-control',]) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('', '', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                    {!! Form::reset('Cancel', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::hidden('user_id', \Illuminate\Support\Facades\Auth::user()->id) !!}
                            {!! Form::hidden('status_id', 1) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
