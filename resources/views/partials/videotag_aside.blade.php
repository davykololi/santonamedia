<aside class="sidebar-right">
    <h4> SEARCH FOR VIDEOS </h4>
    @include('partials.videosearch')
    <div class="sidebar-module">
        <br/>
        <h4> LATEST {!! $tag->name !!} VIDEOS</h4>
           @include('partials.videolinks_aside')
    </div>
    @include('partials.videocat_n_vdext')
</aside><!-- /.blog-sidebar -->