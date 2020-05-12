<aside class="aside" id="sidebars">
    <h4 class="astitle">SEARCH FOR ARTICLES </h4>
    @include('partials.postsearch')
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($tag->name) !!} ARTICLES </h4>
            @include('partials.articlelinks_aside')
    </div>
    @include('partials.postcat_n_ext') 
</aside><!-- /.blog-sidebar -->