<div class="sidebar-right">
    <h4> Search For Videos </h4>
    	@include('partials.videosearch')
    <div class="sidebar-module">
       <br/>
       <h4> Latest {!! $tag->name !!} Videos</h4>
           @include('partials.videolinks_aside')
    </div>
    @include('partials.popularvideo')
</div> <!-- /.blog-sidebar -->
@include('partials.tags_aside')