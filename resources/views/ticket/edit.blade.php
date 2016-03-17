@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">edit Ticket</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'ticket/' . $ticket->id, 'method' => 'PUT']) !!}
                        <div class="form-body">
                            <div class="form-group col-md-12">
                                {!! Form::label('name', 'Titel', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('name', $ticket->name, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('creator', 'Creator', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('creator', $ticket->creator, ['class' => 'form-control', 'placeholder' => 'Creator']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('description', $ticket->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('priority_id', 'Priority', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::select('priority_id', $priorityArray, $priority->id, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('', '', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                    {!! Form::button('Cancel', ['class' => 'btn btn-primary', 'onclick' => 'redirect("/");']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function redirect(url)
        {
            window.location.replace(url)
        }
    </script>
@endsection
