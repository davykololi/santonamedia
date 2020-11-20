@extends('layouts.app')
@section('title'|'Profile')

@section('content')
@include('partials.allnews')
    <section id="contentSection">
        <div class="row">
            @include('partials.messages')
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>{!! $user->name !!} Profile</h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{!! $user->name !!}</td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td><img width="75" height="75" src="/storage/avatars/{!! $user->avatar !!}" onerror="this.src='{{asset('static/avatar.png')}}'"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{!! $user->email !!}</td>
                                </tr>
                                <tr>
                                    <td>Register At</td>
                                    <td>{!! $user->created_at->format('d-m-Y H:i') !!}</td>
                                </tr>
                                <tr>
                                    <td>Number of Comments</td>
                                    <td>{!! $comments_count !!}</td>
                                </tr>
                                <tr>
                                    <td>Upload Your Photo</td>
                                    <td>
                                        <form action="/profile" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <input type="file" class="form-control-file"  name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">
                                                    Please upload a valid image
                                                </small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
