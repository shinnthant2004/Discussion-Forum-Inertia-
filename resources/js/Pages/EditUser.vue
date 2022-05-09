<template>
    <div>
 <Master>
     <div class="card">
         <div class="card-header">Edit User</div>
         <div class="card-body">
             <form>
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
                 <button class="btn btn-primary">Update</button>
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
        }
        return {form}
    }
}
</script>

<style lang="scss" scoped>

</style>
