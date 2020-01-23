@extends('layouts.adminmaster')
@section('title', '| Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categories))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.categories.create')}}"> Add Category</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.tcategory')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="table-text">
                                <div>{{$category->id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$category->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$category->slug}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$category->description}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$category->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('admin.categories.delete', $category->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
