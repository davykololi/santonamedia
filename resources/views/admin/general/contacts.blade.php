@extends('layouts.adminmaster')
@section('title', '| Contact Messages')

@section('content')
<main role="main" class="container" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($contacts))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3 class="titles">CONTACTS LIST </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.tcontacts')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td class="table-text">
                                <div>{{$contact->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$contact->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Str::limit($contact->message,$limit=30,$end= '...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$contact->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('contact.show', $contact->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('contact.destroy', $contact->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
