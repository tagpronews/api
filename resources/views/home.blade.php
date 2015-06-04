@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}">
@endsection

@section('content')
<div class="container-fluid heading-red">
    <div class="row home-image">
        <div class="clearfix"></div>
        <img class="center-block auto-width" alt="Logo" src="{{ asset('assets/images/home_logo.png') }}">
        <img class="center-block auto-width" alt="Pop the balls" src="{{ asset('assets/images/home_pop.png') }}">
    </div>

    <div class="row text-center">
        <h4>The place for all TagPro News, Competitions and Teams</h4>
    </div>

    <!-- TODO: finish button css and remove br -->
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <a href="{{ url('/leagues') }}" class="btn btn-default btn-header pull-right col-md-6 col-xs-12">
                    LEAGUE TABLE
                </a>
            </div>
            <div class="col-sm-6 col-xs-12">
                <a href="{{ url('/players')  }}" class="btn btn-default btn-header col-md-6 col-xs-12">
                    PLAYER RANKING
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -40px;">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-main">
                <div class="panel-heading">
                    <span>News</span>
                </div>
                <div class="panel-body">
                    <img class="auto-width-no-max" src="//placebacon.net/555/200" />
                    <p>text goes here</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-main">
                <div class="panel-heading">
                    <span>Alpha Feedback & Suggestions</span>
                </div>
                <div class="panel-body">
                    <p>
                        Welcome to the Alpha Launch of the TagPro News site!
                        We're very excited to see how far this can go.
                        We need your feedback and suggestions to make sure we continue to head in the right direction.
                        We will read and consider every comment made to us, however we want to keep it focused and simple so not everything will be integrated.
                        If you would also want to help out in any practical way, let us know.
                    </p>

                    <form id="feedback-form" role="form" method="POST" action="{{ url('/feedback') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email (optional)">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="feedback" placeholder="Your Message" rows="5" style="resize:vertical;"></textarea>
                        </div>

                        <button class="btn btn-primary">SEND</button>
                        <i id="feedback-sending" class="fa fa-spinner fa-pulse" style="display:none"></i>
                        <i id="feedback-sent" class="fa fa-check" style="display:none"></i>
                        <span id="feedback-error" style="display:none"><i class="fa fa-times"></i> Something went wrong, refresh & try again</span>
                    </form>

                    <p>
                        Once the final site is complete for release, this feedback suggestion will be
                        changed with something such as league table, latest results or videos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
$( "#feedback-form" ).submit(function( event ) {
    event.preventDefault();
    $( "#feedback-sending" ).show();
    $( "#feedback-sent" ).hide();

    $.ajax({
        type : 'POST',
        url : '/feedback',
        data : {
            '_token' : $('input[name=_token]').val(),
            'email' : $('input[name=email]').val(),
            'feedback' : $('textarea[name=feedback]').val()
        },
        success : function(){
            $('input[name=email]').val('');
            $('textarea[name=feedback]').val('');
            $( "#feedback-sending" ).hide();
            $( "#feedback-sent" ).show();
        },
        error : function(){
            $( "#feedback-sending" ).hide();
            $( "#feedback-error" ).show();
        }
    });
});
@endsection