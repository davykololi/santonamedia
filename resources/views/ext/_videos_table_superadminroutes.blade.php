                            <td>
                                <form action="{!! route('superadmin.videos.destroy', $video->id) !!}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{!! route('superadmin.videos.show', $video->id) !!}" class="label label-success">Details</a>
                                    <a href="{!! route('superadmin.videos.edit', $video->id) !!}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete  {!! $video->title !!}?')">
                                        Delete
                                    </button>
                                </form>
                            </td>