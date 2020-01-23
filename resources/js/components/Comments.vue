<template>
	<div class="card my-4">
		<h5 class="card-header">Leave a comment:</h5>
		<div class="card-body">
			<form>
				<div class="form-group">
					<textarea ref="content" class="form-control" rows="3"></textarea>
				</div>
				<button type="submit" @click.pevent="addComment" class="btn btn-primary">
					Submit
				</button>
			</form>
		</div>
			<p class="border p-3" v-for="comment in comments">
			<img :src="img"/>
				<strong> {{comment.user.name}} </strong>:
				<span> {{comment.content}} </span>
			</p>
	</div>
</template>

<script>
export default{
	props:{
		userName:{
			type:String,
			required:true
		},
		postId:{
			type:Number,
			required:true
		},
		userAvatar:{
			type:String,
			required:true
		}
	},

	data(){
		return{
			comments:[],
			img: "'@/storage/avatars/'+comment.user.avatar"
		};
	},

	created(){
		this.fetchComments();

		Echo.private("comment").listen("CommentSent",e => {
			this.comments.push({
					user:{name:e.user.name},
					content:e.comment.content,
					user:{avatar:e.user.avatar}
			});
		});
	},

	methods: {
		fetchComments(){
			axios.get("/" + this.postId + "/comments").then(response=>{
				this.comments=response.data;
			});
		},

		addComment(){
			let content = this.$refs.content.value;
			axios.post("/" + this.postId + "/comments",{content}).then(response=>{
				this.comments.push({
					user:{name:this.userName},
					content:this.$refs.content.value,
					user:{avatar:this.userAvatar},
				});
				this.$refs.content.value = "";
			});
		}
	}
};
</script>