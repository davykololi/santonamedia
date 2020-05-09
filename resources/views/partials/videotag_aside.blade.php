<aside class="w3-sidebar w3-bar-block">
    <h4 class="astitle">SEARCH FOR VIDEOS </h4>
    @include('partials.videosearch')
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($tag->name) !!} VIDEOS</h4>
           @include('partials.videolinks_aside')
    </div>
    @include('partials.videocat_n_vdext')
</aside><!-- /.blog-sidebar -->