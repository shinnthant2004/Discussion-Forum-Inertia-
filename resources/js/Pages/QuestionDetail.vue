<template>
    <div>
     <Master>
         <div class="card mb-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span class="badge bg-danger">Need Fixed!</span>
                          <span class="text-white ms-2">{{ question.title }}</span>
                        </div>
                        <div>
                          <a href="/delete" class="badge bg-danger text-right ms-1">Delete</a>
                          <a class="badge bg-warning text-right ms-1">Fixed</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Like -->
                   <div class="row p-2">
                     <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i class="fas fa-heart text-danger"></i>
                            <small>{{ question.like_count}}</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>{{ question.comment.length }}</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                    <div class="col-md-7">
                          <a class="badge bg-dark ms-2" v-for="tag in question.tag" :key="tag.id">{{ tag.name }}</a>
                    </div>
                    <div class="col-md-2">
                        <Link class="btn btn-sm btn-primary" href="/question/detail">View</Link>
                    </div>
                </div>
                <!-- LikeEnd -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <p class="mb-0">{{ question.description }}</p>
                        </div>
                    </div>
                <!-- Comment Here-->
                    <div class="row my-2">
                        <div class="col-md-12">
                            <form @submit.prevent="createComment(question.id)">
                                <textarea v-model="comment" class="form-control" placeholder="Give Answer"></textarea>
                                <div class="text-end">
                                    <button class="btn-sm btn-warning my-2">Enter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- Comment End -->
                    <!-- Comment Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" v-for="c in question.comment" :key="c.id">
                                <div class="card-header bg-dark text-white">
                                    <img  class="me-2" :src="c.user.image" width="50" style="border-radius:50%" />
                                   {{ c.user.name }}
                                    <small class="ms-2">Commented {{ c.date }}</small>
                                </div>
                                <div class="card-body">
                                    <p >{{ c.content }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
               </div>

          </div>
       </Master>
    </div>
</template>

<script>
import Master from './Layout/Master.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from '@vue/reactivity';
import axios from 'axios';

export default {
    props:{question:Object},
    components:{Master,Link},
    setup(props){
        let comment=ref('');
        let createComment=(q_id)=>{
           let data=new FormData();
           data.append('question_id',q_id);
           data.append('content',comment.value);
           axios.post('/question/comment/create',data).then(res=>{
              let {success,comment}=res.data;
              if(success){
                  props.question.comment.push(comment);
              }
           })
       }
       return {createComment,comment}
    }
}
</script>

<style lang="scss" scoped>

</style>
