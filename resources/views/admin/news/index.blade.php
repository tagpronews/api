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
                    <tr>
                        <td>Example heading</td>
                        <td>General</td>
                        <td>25th May 2015</td>
                        <td>Flambe</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h2>Add News</h2>

                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="heading" placeholder="News Headline">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image">
                        <p class="help-block">Images must be at least 600px.</p>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option value="general">General</option>
                            <option value="leagues">Leagues</option>
                            <option value="videos">Videos</option>
                            <option value="streaming">Streaming</option>
                            <option value="mumble">Mumble</option>
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
