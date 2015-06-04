@extends('layouts.app')

@section('content')
<div class="container-fluid heading-red">
    <div class="container">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6">
                <h2>Published</h2>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fa fa-caret-down"></i> Heading</th>
                        <th><i class="fa fa-caret-down"></i> Category</th>
                        <th><i class="fa fa-caret-down"></i> Date</th>
                        <th>Author</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($articles as $post)
                        <tr>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['category_id']}}</td>
                            <td>{{$post['created_at']}}</td>
                            <td>{{$post['user_id']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h2>Add News</h2>

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

                <form role="form" method="post" action="{{url('admin/news')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="News Headline">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image">
                        <p class="help-block">Images must be at least 600px.</p>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option value="1">General</option>
                            <option value="2">Leagues</option>
                            <option value="3">Videos</option>
                            <option value="4">Streaming</option>
                            <option value="5">Mumble</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="content" placeholder="News Content" rows="10" style="resize:vertical;"></textarea>
                    </div>

                    <button class="btn btn-primary">PUBLISH</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
