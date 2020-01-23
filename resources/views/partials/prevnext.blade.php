<h5 id="firebrick" style="text-align: center;">PEROUSE ALL POSTS</h5>
<div class="row">
    <div class="col-md-6">
        @if(isset($previous))
        <div class="alert-success">
            <a href="{{route('users.posts.read',['post_slug' => $previous->slug])}}">
                <div class="btn-content" id="prenext">
                    <div class="btn-content-title"><i class="fa fa-arrow-left"></i> Previous </div>
                    <p class="btn-content-subtitle">{{$previous->title}}</p>
                </div>
            </a>
        </div>
        @endif
    </div>
    <div class="col-md-6">
        @if(isset($next))
        <div class="alert-success">
            <a href="{{route('users.posts.read',['post_slug' => $next->slug])}}">
                <div class="btn-content" id="prenext">
                    <div class="btn-content-title"><i class="fa fa-arrow-right"></i> Next </div>
                    <p class="btn-content-subtitle">{{$next->title}}</p>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>