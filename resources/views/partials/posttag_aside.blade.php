<div class="sidebar-right">
    <h4> SEARCH FOR ARTICLES </h4>
    @include('partials.postsearch')
    <div class="sidebar-module">
        <br/>
        <h4> LATEST {!! $tag->name !!} ARTICLES </h4>
            @include('partials.articlelinks_aside')
    </div>
    @include('partials.postcat_n_ext') 
</div> <!-- /.blog-sidebar -->
@include('partials.tags_aside')