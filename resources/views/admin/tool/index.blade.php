@extends('layouts.adminmaster')
@section('title', '| Keyword Density Tool')

@section('content')
<main role="main" class="container mt-3">
<p> Key Density </p>
<form id="keywordDensityInputForm">
	<div class="form-group">
    	<label for="keywordDensityInput">HTML or Text</label>
        <textarea class="form-control" id="keywordDensityInput" rows="12"></textarea>
    </div>
   <button type="submit" class="btn btn-primary mb-2">Get Keyword Densities</button>
</form>
</main>
@endsection