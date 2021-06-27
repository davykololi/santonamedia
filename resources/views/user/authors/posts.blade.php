@extends('layouts.app')

@section('content')
@include('partials.adminnews')
  @include('ext._authorposts_section')
  @include('ext._all_articles_ext')
@endsection


