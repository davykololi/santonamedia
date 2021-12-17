                            <td class="table-text">
                                <div>{!! $post->category->name !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->title !!}</div>
                            </td>
                            <td class="table-text">
                                <img style = "width:40%" src="/storage/public/storage/{!! $post->image !!}" alt="{!! $post->title !!}"/>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->caption !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Illuminate\Support\Str::words($post->description,5,'...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->excerpt() !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $post->is_published ? "Published" : "Pending" !!}</div>
                            </td>