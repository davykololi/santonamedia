@extends('layouts.superadmin')
@section('title', '| All Admins')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($admins))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ADMINS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.admins.create')}}"> Add Admin</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.admintbhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td class="table-text">
                                <div>{{$admin->title}} {{$admin->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <img style="width: 25%" src="{!! $admin->imageUrl() !!}" alt="{!! $admin->name !!}">
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->phone_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->area}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    @if($admin->isBanned())
                                        <label class="label label-danger">Yes</label>
                                    @else
                                        <label class="label label-success">No</label>
                                    @endif
                                </div>
                            </td>
                            <td class="table-text">
                                <div>
                                    @if($admin->isBanned())
                                        <a href="{{route('superadmin.admin.revoke',[$admin->id])}}" class="label label-success">Revoke</a>
                                    @else
                                        <a href="{{route('superadmin.admin.bann',$admin->id)}}" class="label label-danger">Bann</a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <form action="{!! route('superadmin.admins.destroy',$admin->id) !!}" method="POST">
                                    {!! csrf_field() !!}
                                    @method('DELETE')
                                    <a href="{!! route('superadmin.admins.show',$admin->id) !!}" class="label label-success">Details</a>
                                    <a href="{!! route('superadmin.admins.edit',$admin->id) !!}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {{$admin->name}}?')">
                                        Delete
                                    </button>
                                <form>
                            </td>
                    @empty
                            <td colspan="10">
                                <div style="font-size: 16px;color: red;font-family: Times New Roman">
                                    <h3>No admin(s) created yet.</h3>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
