@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#DF3442;padding-bottom: 100px;">
    <div class="row home-image">
        <div class="clearfix"></div>
        <img class="center-block" alt="Logo" src="{{ asset('assets/images/home_logo.png') }}">
        <img class="center-block" alt="Pop the balls" src="{{ asset('assets/images/home_pop.png') }}">
    </div>

    <div class="row text-center">
        <h4>The place for all TagPro News, Competitions and Teams</h4>
    </div>

    <!-- TODO: finish button css and remove br -->
    <br>

    <div class="row">
        <div class="btn-header-group">
            <a href="{{ url('/leagues') }}" class="btn btn-default btn-header pull-left">
                LEAGUE TABLE
            </a>
            <a href="{{ url('/players')  }}" class="btn btn-default btn-header pull-right">
                PLAYER RANKING
            </a>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -42px;">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>News</h2>
                </div>
                <div class="panel-body">
                    <img src="//placekitten.com/553/200" />
                    <p>text goes here</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Alpha Feedback & Suggestions</h2>
                </div>
                <div class="panel-body">
                    <p>
                        Welcome to the Alpha Launch of the TagPro News site!
                        We're very excited to see how far this can go.
                        We need your feedback and suggestions to make sure we continue to head in the right direction.
                        We will read and consider every comment made to us, however we want to keep it focused and simple so not everything will be integrated.
                        If you would also want to help out in any practical way, let us know.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
