@extends('layouts.app')

@section('content')
<div class="content" style="background-color:#DF3442;padding-bottom: 150px;">
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
