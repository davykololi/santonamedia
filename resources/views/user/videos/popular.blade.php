@if(!empty($popular))
@foreach($popular as $video)
<a id="white" href="{!! $video->path() !!}" >{!! $video->title !!}</a>
@endforeach
@endif
            