@extends('layouts.superadmin')
@section('title', '| All Admins')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($admins))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ADMINS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admins.create')}}"> Add Admin</a>
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
                    @foreach($admins as $admin)
                        <tr>
                            <td class="table-text">
                                <div>{{$admin->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <img style="width: 25%" src="/storage/public/storage/{!! $admin->image !!}" alt="{!! $admin->name !!}">
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->title}}</div>
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
                                <div>{{$admin->keywords}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->created_at}}</div>
                            </td>
                            <td>
                                <form action="{{url('admins',$admin->id)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{ route('admins.show', $admin->id) }}" class="label label-success">Details</a>
                                    <a href="{{ route('admins.edit', $admin->id) }}" class="label label-warning">Edit</a>
                                    <input type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete?')" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
