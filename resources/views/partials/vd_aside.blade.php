<aside class="w3-sidebar w3-bar-block" id="right-side">
    <h4 class="astitle">SEARCH FOR VIDEOS </h4>
    @include('partials.videosearch')
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($category->name) !!} VIDEOS </h4>
            @include('partials.videolinks_aside')
</aside><!-- /.blog-sidebar -->