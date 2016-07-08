@extends('layouts.app')

<?php
/*
    if(isset($_GET['showall']) AND $_GET['showall'] == true)
    {
        setcookie ("showall", true, 2147480047);
    }
    */
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Tickets
                    <a href="ticket/create" class="pull-right"><i class="glyphicon glyphicon-plus"></i></a>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-9">
                            <div class="checkbox-list">
                                <label class="checkbox-inline">
                                    <div class="checker" id="uniform-inlineCheckbox21">
                                        <span>
                                            <input type="checkbox" onclick="showAllTickets();" class="showall" name="showall" value="1">
                                        </span>
                                    </div>
                                    Show closed tickets
                                </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <table class="table table-bordered table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Creator</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                            <?php
                            $timestamp = \Carbon\Carbon::parse($ticket->created_at);
                            $class = 'danger';
                            switch($ticket->status)
                            {
                                case 'new':
                                    $class = ' danger';
                                    break;
                                case 'opened':
                                    $class = ' info';
                                    break;
                                case 'closed':
                                    $class = ' success';
                                    break;
                                case 'suspended':
                                    $class = ' warning';
                                    break;
                            }
                            ?>
                            <tr onclick="redirect({{ $ticket->id }});">
                                <td class="col-lg-1">{{ $ticket->id }}</td>
                                <td class="col-lg-3">{{ $timestamp->formatLocalized('%A, %d %B %Y') }}</td>
                                <td class="col-lg-1">{{ \App\User::find($ticket->user_id)->name }}</td>
                                <td class="col-lg-1">{{ $ticket->creator }}</td>
                                <td class="col-lg-4">{{ $ticket->title }}</td>
                                <td class="col-lg-4">{{ $ticket->priority }}</td>
                                <td class="col-lg-1{{ $class }}">{{ $ticket->status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($_GET['showall']) AND $_GET['showall'] == 'true')
                        {!! $tickets->appends(['showall' => 'true'])->links() !!}
                    @else
                        {!! $tickets->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
        function redirect(id)
        {
            window.location.replace("ticket/" + id);
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }

        function showAllTickets()
        {
            /*
            if(getUrlParameter('showall') == 'true')
            {
                if(getUrlParameter('page'))
                {
                    window.location.replace('/?page=' + getUrlParameter('page'));
                }
                else
                {
                    window.location.replace('/');
                }
            }
            else
            {
                if(getUrlParameter('page'))
                {
                    window.location.replace('?showall=true&page=' + getUrlParameter('page'));
                }
                else
                {
                    window.location.replace('?showall=true');
                }
            }
            */
            var val = getCookie('showall');   
            if(val == 'true')
            {
                document.cookie="showall=false; expires=Thu, 18 Dec 2019 12:00:00 UTC";
                if(getUrlParameter('page'))
                {
                    window.location.href('/?page=' + getUrlParameter('page'));
                }
                else
                {
                    window.location.href('/');
                }
            }
            else
            {
                document.cookie="showall=true; expires=Thu, 18 Dec 2019 12:00:00 UTC";
                if(getUrlParameter('page'))
                {
                    window.location.href('/?page=' + getUrlParameter('page'));
                }
                else
                {
                    window.location.href('/');
                }
            }            
        }


        $(document).ready(function(){
            var val = getCookie('showall');   
            console.log(val, 'hi');
            if(val == 'true')
            {
                $('.showall').prop('checked', true);    
            }
            else
            {
                $('.showall').prop('checked', false);
            }
            
        });
    </script>
@endsection
