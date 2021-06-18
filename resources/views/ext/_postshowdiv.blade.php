    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1 id="fb" class="textupper"> {!! $post->title !!} </h1>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {!! date("F j,Y,g:i a",strtotime($post->created_at)) !!} 
                By:<span class="label label-info" style="margin: 2px"> {!! $post->admin->name !!} </span>
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style = "width:25%" src="{!! $post->imageUrl() !!}" alt="{!! $post->title !!}"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! $post->caption !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! $post->description !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {!! $post->content !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Key Words:</strong>
            {!! $post->keywords !!}
        </div>
    </div>
