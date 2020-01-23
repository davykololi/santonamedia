@if(!empty($kings))
@foreach($kings as $king)
<a class="mcolor" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >{{ $post->title }}</a>
@endforeach
@endif
            