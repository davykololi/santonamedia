<aside class="blog-sidebar" id="aside">
    <h4 class="astitle">SEARCH FOR ARTICLES </h4>
    @include('partials.postsearch')
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($tag->name) !!} ARTICLES </h4>
            @include('partials.articlelinks_aside')
</aside><!-- /.blog-sidebar -->