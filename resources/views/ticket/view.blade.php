@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ticket #{{ $ticket->id }}
                        <a href="{{ $ticket->id }}/edit" class="pull-right"><i class="glyphicon glyphicon-pencil"></i></a>
                    </div>
                    {!! Form::open(['url' => 'ticket/status', 'method' => 'post']) !!}
                    <div class="panel-body">
                        <div class="form-body">
                            <div class="form-group col-md-12">
                                {!! Form::label('name', 'Titel', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {{ $ticket->name }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('creator', 'Creator', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {{ $ticket->creator }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {{ $ticket->description }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('name', 'User', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('priority_id', 'Priority', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {{ $priority->title }}
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                            <div class="form-group col-md-12">
                                {!! Form::label('name', 'Status', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::select('status_id', $statusArray, $status->id, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('', '', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                            @else
                                <div class="form-group col-md-12">
                                    {!! Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {{ $status->title }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        {!! Form::hidden('id', $ticket->id) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
