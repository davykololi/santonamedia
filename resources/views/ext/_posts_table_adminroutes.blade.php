							<td>
                                <a href="{!! route('admin.posts.show', $post->id) !!}" class="label label-success">Details</a>
                                <a href="{!! route('admin.posts.edit', $post->id) !!}" class="label label-warning">Edit</a>
                                <a href="{!! route('admin.posts.delete', $post->id) !!}" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $post->title !!}?')">
                                    Delete
                                </a>
                            </td>