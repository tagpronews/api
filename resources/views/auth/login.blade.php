@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#E03442;padding-bottom: 150px;">
	<div class="row">
        <div style="width:300px;margin: 0 auto">

            <div class="login-form-avatar">ME</div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="width:100%">LOGIN</button>
                </div>

                <div class="form-group form-helper-links">
                    <a href="{{ url('/password/email') }}"><small>Forgot Your Password?</small></a>
                    <a class="pull-right" href="{{ url('/auth/register') }}"><small>Create an Account</small></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
