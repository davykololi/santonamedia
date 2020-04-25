@if($errors->any())
    <div class="alert alert-danger">
    	<strong> Whoops! </strong>There was a problem with your input.<br/>
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach()
    </div>
@endif