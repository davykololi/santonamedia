@if(!empty($popular))
@foreach($popular as $post)
<a id="white" href="{!! route('users.posts.read', ['post_slug' => $post->slug]) !!}" >{!! $post->title !!}</a>
@endforeach
@endif
            