<template>
 <Master>
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <form @submit.prevent="createQuestion" class="card shadow p-3 text-center">
                     <h3 class="text-primary mb-3">Create Question</h3>
                     <div class="my-2">
                         <input v-model="form.title" type="text" class="form-control" placeholder="Enter Title"/>
                     </div>
                     <div class="my-2 text-start">
                       <label class="my-2 text-black-50">Question Tags</label>
                       <select v-model="form.tag" class="form-control">
                           <option v-for="tag in $page.props.tags" :key="tag.id" :value="tag.id">{{ tag.name }}</option>
                       </select>
                     </div>
                     <div class="my-2">
                         <textarea v-model="form.description" class="form-control" placeholder="Enter question"></textarea>
                     </div>
                     <div class="text-end my-2">
                        <div class="text-end my-2">
                            <button class="btn btn-primary">Enter</button>
                        </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</Master>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import Master from './Layout/Master.vue'
import axios from 'axios';
import { ref } from '@vue/reactivity';
export default {
      components:{Master},
      setup(){
         let form=useForm({
             title:null,
             description:null,
             tag:null,
         })
       let createQuestion=()=>{
        //   axios.post(route('question.create',form.value)).then(res=>{
        //      if(res.data.success){
        //        console.log('success')
        //      }
        //   })
         form.post(route('question.create'))
       };
        return {createQuestion,form}
      }
}
</script>

<style lang="scss" scoped>

</style>
