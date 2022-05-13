<template>
    <div>
         <Master>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <Pagination :links="$page.props.questions.links"></Pagination>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="card shadow my-2"  v-for="(q,index) in ques.data" :key="q.id">
                          <div class="card-body">
                           <div class="d-flex justify-content-between">
                                <Link :href="route('question.detail',q.slug)" style="text-decoration:none;font-weight:bold">{{ q.title  }}</Link>
                                <i @click="deleteQuestion(index,q.id)" class="fas fa-trash text-danger"></i>
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
import Pagination from './Components/Pagination.vue'
import { ref } from '@vue/reactivity';
import Master from './Layout/Master.vue';
import { onMounted } from '@vue/runtime-core';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';
    export default {
    props:{questions:Array},
    components: { Master,Link, Pagination },
    setup(props){
        let ques=ref([]);
        onMounted(()=>{
            ques.value=props.questions
        });
        let deleteQuestion=(index,q_id)=>{
            axios.get(route('question.delete',q_id)).then(res=>{
                if(res.data.success){
                    ques.value.splice(index,1);
                }
            })
        }
        return {ques,deleteQuestion}
    }
}
</script>

<style lang="scss" scoped>

</style>
