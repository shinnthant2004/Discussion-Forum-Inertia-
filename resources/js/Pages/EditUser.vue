<template>
    <div>
 <Master>
     <div class="card">
         <div class="card-header">Edit User</div>
         <div class="card-body">
             <form @submit.prevent="update">
                 <div v-if="$page.props.success" class="my-3">
                     <div class="alert alert-success">{{ $page.props.success }}</div>
                 </div>
                 <div class="my-3">
                     <label for="name">Name</label>
                     <input type="text" v-model="form.name"  id="name"  class="form-control"/>
                 </div>
                 <div class="my-3">
                     <label for="email">Email</label>
                     <input type="email" v-model="form.email"   id="email" class="form-control"/>
                 </div>
                 <div class="my-3">
                     <label for="password">Password</label>
                     <input type="password" v-model="form.password" id="password" class="form-control"/>
                 </div>

                 <div class="my-3">
                     <label for="image">Choose Image</label>
                     <input  @input="form.image = $event.target.files[0]"  type="file" id="image" class="form-control"/>
                 </div>
                 <div class="my-2">
                     <img :src="auth_user.image" width="80">
                 </div>
                 <button type="submit" class="btn btn-primary float-right" :disabled="form.processing">
                         <div v-show="form.processing" class="spinner-border spinner-border-sm text-white" role="status">
                               <span class="visually-hidden">Loading...</span>
                         </div>
                           <div v-if="form.processing">Wait</div>
                           <div v-else>Update</div>
                 </button>
             </form>
         </div>
     </div>
 </Master>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import Master from './Layout/Master.vue'
export default {
    components:{Master},
    props:{
        auth_user:Object
    },
    setup(props){
        let form=useForm({
            name:'',
            email:'',
            password:'',
            image:''
        });
        if(props.auth_user){
           form.name=props.auth_user.name;
           form.email=props.auth_user.email;
           form.password=props.auth_user.password;
        };
        let update=()=>{
            form.post('/profile/edituser')
        }
        return {form,update}
    }
}
</script>

<style lang="scss" scoped>

</style>
