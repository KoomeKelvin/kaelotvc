@extends('layouts.student-app')
@section('content')
<div class="container">
    <div class="row mx-auto">
        <div class="col-md-12">
            @if(!empty($discussion))
            <div class="jumbotron">
            <h1>{{$discussion->title}}</h1>
            <h5> <em> Posted by Teacher {{$discussion->user->name}} on {{$discussion->created_at->toFormattedDateString()}} </em></h5>
            <p>{!!$discussion->body!!}</p>
            @foreach($discussion->files as $file)
            <a href="/storage/AandStaff/{{$file->file_path}}" target="_blank">{{$file->file_path}} <i class="fa fa-download"></i></a>
            @endforeach
             <hr>
            <div class="form-group row mx-auto">
                <label for="discussioncomment" class="col-form-label col-form-label-lg">Comment:</label>
                <textarea class="form-control" id="discussioncomment" name="discussioncomment" v-model="discussioncomment">Leave a comment..</textarea>
                <button class="btn btn-outline-info mt-2" @click.prevent="postComment">Comment</button>
            </div>
        <h3><span><i class="fa fa-comment"></i></span>@{{comments.length}} Comments</h3>
            <div v-for="comment in comments">
            <div class="comment-wrap">   
             <img :src="'/storage/student/passport/'+comment.student.passport" alt="No image" class="image-wrap">
                <div class="author-wrap">
                    <h4>@{{comment.student.full_name}} </h4>
                <p class="author-time">@{{comment.created_at}}</p>
                </div>
             <h4 class="author-comment">@{{comment.body}}</h4>
            </div>
            </div>
            </div>
        @endif
       
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    var app= new Vue({
        el: '#app',
        data:{
            comments: {

            },
            discussioncomment:'',
            user: {!!Auth::guard('student')->user()->toJson()!!},
            discussion: {!! $discussion->toJson() !!}
            },
            mounted(){
                this.getComment();
                this.listen();

            },
            methods :{
                getComment(){
                    axios.get('/api/discussions/'+this.discussion.id+'/comments', {
                        params:{
                            api_token:this.user.api_token
                        }
                    })
                    .then((response)=>{
                        console.log(response.data)
                        this.comments=response.data
                    }).catch(function(error){
                        console.log(error)
                    });
                },
                postComment(){
                    
                    axios.get('/api/discussions/'+this.discussion.id+'/comment', {
                       params:{
                        api_token:this.user.api_token,
                        body: this.discussioncomment
                       } 
                    })
                    .then((response)=>{
                        this.comments.unshift(response.data),
                        this.discussioncomment='';
                      
                    })
                    .catch(function(error){
                        console.log(error)
                    });
                    },
                    listen(){
                        Echo.channel('discussion.'+$this.discussion.id)
                        .listen('NewComment', (comment)=>{
                            this.comments.unshift(comment)
                        })
                    }
            }

        });
</script>
@endsection