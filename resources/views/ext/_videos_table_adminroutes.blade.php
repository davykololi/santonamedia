							<td>
                                <a href="{!! route('admin.videos.show', $video->id) !!}" class="label label-success">Details</a>
                                <a href="{!! route('admin.videos.edit', $video->id) !!}" class="label label-warning">Edit</a>
                                <a href="{!! route('admin.videos.delete', $video->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $video->title !!}?')">
                                    Delete
                                </a>
                            </td>