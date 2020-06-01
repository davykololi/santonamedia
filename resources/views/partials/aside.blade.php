<div class="sidebar-right" style="z-index: 100%">
	<h4> SEARCH FOR ARTICLES </h4>
    @include('partials.postsearch')
    <div class="sidebar-module">
        <br/>
        <h4> LATEST {!! $category->name !!} ARTICLES </h4>
        @include('partials.articlelinks_aside')
        @include('partials.postcat_n_ext') 
    </div>
</div> <!-- /.blog-sidebar -->
@include('partials.tags_aside')
