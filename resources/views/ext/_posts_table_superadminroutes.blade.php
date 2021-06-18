							<td>	
								<form action="{!! route('superadmin.posts.destroy', $post->id) !!}" method="POST">
                            		@csrf
                            		@method('DELETE')
                                	<a href="{!! route('superadmin.posts.show', $post->id) !!}" class="label label-success">Details</a>
                                	<a href="{!! route('superadmin.posts.edit', $post->id) !!}" class="label label-warning">Edit</a>
                                	<button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {!! $post->title !!}?')">
                                     Delete
                                	</button>
                                </form>
                             </td>