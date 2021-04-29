<template>
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                <h4 class="">Submit Your Comments Here</h4>
                <input type="text" v-model="comment_details.author" placeholder="Enter your name..." class="form-control">
                <textarea class="form-control mar-top" v-model="comment_details.comment" rows="2" placeholder="Add comment..."></textarea>
                <div class="mar-top clearfix">
                    <button class="btn btn-sm btn-success pull-right" type="submit" @click="addComment(null, 0)"><i class="fa fa-paper-plane fa-fw"></i> Submit</button>
                </div>
            </div>
        </div>

        <div class="panel" v-if="comments.length > 0">
            <div class="panel-body">
                <div class="media-block" v-for="(comment, index) in comments">
                    <div class="media-body">
                        <div class="mar-btm">
                            <span class="author-name-color font-weight-bold media-heading box-inline">{{comment.author}}</span>
                            <p class="text-muted text-sm">{{comment.created_datetime}}</p>
                        </div>
                        <p>{{comment.comment}}</p>
                        <div class="pad-ver">
                            <button type="button" class="btn btn-sm btn-info btn-hover-primary" @click="showReply(comment.comment_id)">
                                <i class="fa fa-reply"></i> Reply
                            </button>
                        </div>
                        <hr>
                        <div class="reply" v-if="isReply[comment.comment_id]">
                            <input type="text" placeholder="Enter your name..." class="form-control" v-model="comment_details_reply.author">
                            <textarea class="form-control mar-top" v-model="comment_details_reply.comment" rows="2" placeholder="Add comment..."></textarea>
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-success pull-right" type="submit" @click="addComment(comment.comment_id, index)"><i class="fa fa-paper-plane fa-fw"></i> Submit</button>
                            </div>
                        </div>

                    <!-- Reply 1 -->
                        <div class="mar-left" v-if="comment.replies.length > 0">
                            <div class="media-block" v-for="(reply, index2) in comment.replies">
                                <div class="media-body">
                                    <div class="mar-btm">
                                        <span class="author-name-color font-weight-bold media-heading box-inline">{{reply.author}}</span>
                                        <p class="text-muted text-sm">{{reply.created_datetime}}</p>
                                    </div>
                                    <p>{{reply.comment}}</p>
                                    <button type="button" class="btn btn-sm btn-info btn-hover-primary" @click="showReply(reply.comment_id)">
                                        <i class="fa fa-reply"></i> Reply
                                    </button>
                                    <hr>
                                    <div class="reply" v-if="isReply[reply.comment_id]">
                                        <input type="text" placeholder="Enter your name..." class="form-control" v-model="comment_details_reply.author">
                                        <textarea class="form-control mar-top" v-model="comment_details_reply.comment" rows="2" placeholder="Add comment..."></textarea>
                                        <div class="mar-top clearfix">
                                            <button class="btn btn-sm btn-success pull-right" type="submit" @click="addComment(reply.comment_id, index2)"><i class="fa fa-paper-plane fa-fw"></i> Submit</button>
                                        </div>
                                    </div>
                                    <!-- Reply 2 -->
                                    <div class="mar-left" v-if="('replies' in comment.replies[index2])">
                                        <div class="media-block" v-for="(reply2, index3) in comment.replies[index2].replies">
                                            <div class="media-body">
                                                <div class="mar-btm">
                                                    <span class="author-name-color font-weight-bold media-heading box-inline">{{reply2.author}}</span>
                                                    <p class="text-muted text-sm">{{reply2.created_datetime}}</p>
                                                </div>
                                                <p>{{reply2.comment}}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertModalLabel">Input Validation</h5>
                    </div>
                    <div class="modal-body">
                        {{alert_message}}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
        </div>
    </div> 
</template>
<script>
    
    export default {
        props: ['comment_id', 'author', 'comment', 'parent_id', 'created_datetime'],
        data(){
            return {
                comments : {},
                comment_details: {
                    author: '',
                    comment: '',
                    parent_id: 0
                },
                comment_details_reply: {
                    author: '',
                    comment: '',
                    parent_id: 0
                },
                comment_data: {},
                alert_message: '',
                isReply: []
            }
        },
        mounted() {
            this.showComments();
        },
        methods: {
            showComments(){
                axios.get('showComments/').then((response) => {
                    this.comments = response.data;
                }).catch((errors) => {
                    console.log(errors);
                });
            },
            addComment(comment_id = null, index = null){
                if(this.isReply[comment_id])
                {
                    if(this.comment_details_reply.author == '' || this.comment_details_reply.author == null || this.comment_details_reply.author == ' ')
                    {
                        this.alert_message = 'Your name is required';
                        $('#alertModal').modal('show');
                        return false;
                    }

                    if(this.comment_details_reply.comment == '' || this.comment_details_reply.comment == null || this.comment_details_reply.comment == ' ')
                    {
                        this.alert_message = 'Your comment message is required';
                        $('#alertModal').modal('show');
                        return false;
                    }
                    if(comment_id != null)
                    {
                        this.comment_details_reply.parent_id = comment_id;
                    }
                    else
                    {
                        this.comment_details_reply.parent_id = 0;
                    }

                    this.comment_data = this.comment_details_reply;
                }
                else
                {
                    if(this.comment_details.author == '' || this.comment_details.author == null || this.comment_details.author == ' ')
                    {
                        this.alert_message = 'Your name is required';
                        $('#alertModal').modal('show');
                        return false;
                    }

                    if(this.comment_details.comment == '' || this.comment_details.comment == null || this.comment_details.comment == ' ')
                    {
                        this.alert_message = 'Your comment message is required';
                        $('#alertModal').modal('show');
                        return false;
                    }
                    if(comment_id != null)
                    {
                        this.comment_details.parent_id = comment_id;
                    }
                    else
                    {
                        this.comment_details.parent_id = 0;
                    }

                    this.comment_data = this.comment_details;
                }


                axios.post('addComment/', this.comment_data).then((response) => {
                    this.comment_data.author = '';
                    this.comment_data.comment = '';
                    Vue.set(this.isReply, comment_id, 0);
                    this.showComments();
                }).catch((errors) => {
                    console.log(errors);
                });
            },
            showReply(index){
                if(this.isReply[index])
                {
                    Vue.set(this.isReply, index, 0);
                }
                else
                {
                    Vue.set(this.isReply, index, 1);
                }
            }
        }
    }
</script>