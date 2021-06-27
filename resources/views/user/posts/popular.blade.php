@if(!empty($popular))
@foreach($popular as $post)
<a id="white" href="{!! $post->path() !!}" >{!! $post->title !!}</a>
@endforeach
@endif
            