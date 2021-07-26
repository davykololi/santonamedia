                            <td class="table-text">
                                <div>{!! $video->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->title !!}</div>
                            </td>
                            <td class="table-text">
                            <video width="40" height="30" controls> 
                                <source type="video/mp4" src="{!! $video->videoUrl() !!}">
                                	This browser doesn't support video tag.
                            </video>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->caption !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($video->description,10,'...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->excerpt() !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $video->is_published ? "Published" : "Pending" !!}</div>
                            </td>