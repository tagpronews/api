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
        <div class="btn-header-group" style="width:300px;margin: 0 auto;">
            <a href="{{ url('/leagues') }}" class="btn btn-default btn-header pull-left">
                LEAGUE TABLE
            </a>
            <a href="{{ url('/players')  }}" class="btn btn-default btn-header pull-right">
                PLAYER RANKING
            </a>
        </div>
    </div>
</div>
@endsection
