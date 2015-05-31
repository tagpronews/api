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

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width:100%">REGISTER</button>
                    </div>

                    <div class="form-group form-helper-links">
                        <a class="pull-right" href="{{ url('/auth/login') }}"><small>Got an account?</small></a>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection
