<template>
    <div class="container mt-5">
     <div class="col-md-4 offset-4">
         <div class="card">
             <div class="card-header">Register Form</div>
             <div class="card-body">
                 <form @submit.prevent="regist">
                     <div class="my-3">
                         <label for="name" class="mb-2">Enter Name</label>
                         <input v-model="form.name" name="name"  type="text" id="name" :class="['form-control',form.errors.email ?'border border-danger' :'']"/>
                         <div v-if="form.errors.name" v-text="form.errors.name" class="text-danger"></div>
                     </div>
                     <div class="my-3">
                         <label for="email" class="mb-2">Email</label>
                         <input v-model="form.email" name="email"  type="text" id="email" :class="['form-control',form.errors.email ?'border border-danger' :'']"/>
                          <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger"></div>
                     </div>

                     <div class="my-3">
                         <label for="password" class="mb-2">Password</label>
                         <input v-model="form.password" name="password"  type="password" id="password" :class="['form-control',form.errors.email ?'border border-danger' :'']"/>
                          <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger"></div>
                     </div>

                     <div class="my-3">
                         <label for="image" class="mb-2">Image</label>
                         <input @input="form.image = $event.target.files[0]" class="form-control" type="file" id="image" name="image" />
                     </div>


                         <button type="submit" class="btn btn-primary float-right" :disabled="form.processing">
                         <div v-show="form.processing" class="spinner-border spinner-border-sm text-white" role="status">
                               <span class="visually-hidden">Loading...</span>
                         </div>
                           <div v-show="form.processing">Wait</div>
                           <div v-show="!form.processing">Regist</div>
                        </button>

                 </form>
             </div>
         </div>
     </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from '@vue/reactivity';
let form=useForm({
    name:'',
    email:'',
    password:'',
    image:''
});
let regist=()=>{
    form.post('/regist');
}
</script>

<style lang="scss" scoped>

</style>
