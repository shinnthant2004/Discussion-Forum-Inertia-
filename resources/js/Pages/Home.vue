<template>
      <Master :success="$page.props.success">
          <Pagination :links="$page.props.questions.links"/>
               <div v-for="(q,index) in questiones.data" :key="q.id" class="card mb-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span v-if="!q.is_fixed" class="badge bg-danger">Need Fixed!</span>
                          <span v-else class="badge bg-success">Fixed!</span>
                          <span class="text-white ms-2">{{ q.title }}</span>
                        </div>
                        <div>
                          <button v-show="isOwn(q.user_id) && q.is_fixed=='false'" @click="fixQuestion(index,q.id)" class="badge bg-warning text-right ms-1">Fixed</button>
                          <button v-show="isOwn(q.user_id)" href="#" @click="deleteQuestion(index,q.id)" class="badge bg-danger text-right ms-1">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">{{ q.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i v-show="q.is_like=='false'" @click="like(q.id,index)" class="far fa-heart text-danger"></i>
                            <i v-show="q.is_like=='true'"  class="fas fa-heart text-danger"></i>
                            <small>{{ q.like_count }}</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>{{ q.comment.length}}</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>

                        </div>
                    </div>
                    <div class="col-md-7">
                     <Link v-for="tag in $page.props.tags" :href="'?tag='+tag.slug" :key="tag.id" class="badge bg-dark ms-2">{{ tag.name }}</Link>
                    </div>
                    <div class="col-md-2">
                        <Link class="btn btn-sm btn-primary" :href="route('question.detail',q.slug)">View</Link>
                    </div>
                </div>
               </div>
      </Master>
</template>

<script>
import Master from "./Layout/Master.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { ref } from '@vue/reactivity';
import Pagination from "./Components/Pagination.vue";
export default {

    components:{ Master, Link, Pagination },
    props:['questions','auth_user'],

    setup(props){
    let questiones=ref('');
    if(props.questions){
        questiones.value=props.questions
    }

    let like=(id,index)=>{
     questiones.value.data[index].is_like='true';
     questiones.value.data[index].like_count++;
     axios.get(`/question/like/${id}`).then(res => {
     if(res.data.success==true){
          console.log('true');
     }})
    }
    let isOwn=(id)=>{
        let user_id=props.auth_user.id;
        if(id==user_id){
          return true
        }else{
            return false
        }
    }
    let fixQuestion= (index,q_id)=>{
        let form=useForm({
            id:q_id,
        });
        form.post('question/fix')
            questiones.value.data[index].is_fixed=true;
            console.log(questiones.value.data[index].is_fixed=true)
                console.log('success')
    }
    let deleteQuestion=(index,q_id)=>{
            axios.get(route('question.delete',q_id)).then(res=>{
                if(res.data.success){
                    questiones.value.data.splice(index,1);
                }
            })
        }
     return {like,questiones,isOwn,fixQuestion,deleteQuestion}
}
}
</script>

<style lang="scss" scoped>

</style>
