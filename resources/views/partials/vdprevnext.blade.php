<h6>PERUSE ALL VIDEOS</h6>
<div class="row">
    <div class="col-md-6">
        @if(isset($previous))
        <div class="alert-success">
            <a href="{{route('users.videos.read',['video_slug' => $previous->slug])}}">
                <div class="btn-content" id="prenext">
                    <div class="btn-content-title"><i class="fa fa-arrow-left"></i> Previous </div>
                    <span class="btn-content-subtitle">{{$previous->title}}</span>
                </div>
            </a>
        </div>
        @endif
    </div>
    <div class="col-md-6">
        @if(isset($next))
        <div class="alert-success">
            <a href="{{route('users.videos.read',['video_slug' => $next->slug])}}">
                <div class="btn-content" id="prenext">
                    <div class="btn-content-title"><i class="fa fa-arrow-right"></i> Next </div>
                    <span class="btn-content-subtitle">{{$next->title}}</span>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
<hr/>