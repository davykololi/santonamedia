<div class="sidebar-header">
    <div class="latest_post">
      <div class="latest_post_container">
          @forelse($archives as $archive)
              <div class="latest_postnav">
                  <div class="media"> 
                    <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}" class="media-left"> 
                      <img src = "/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/> 
                    </a>
                      <div> 
                        <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}" class="catg_title">
                          {!! $archive->title !!}
                        </a> 
                      </div>
                  </div>
              </div>
          @empty
          <p style="color: red">None</p>
          @endforelse
      </div>
  </div>
</div>

          
