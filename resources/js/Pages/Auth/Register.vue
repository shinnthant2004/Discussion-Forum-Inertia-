<template>
    <div class="container mt-5">
     <div class="col-md-4 offset-4">
         <div class="card">
             <div class="card-header">Register Form</div>
             <div class="card-body">
                 <form @submit.prevent="regist">
                     <div class="my-3">
                         <label for="name" class="mb-2">Enter Name</label>
                         <input v-model="form.name" name="name"  type="text" id="name" class="form-control"/>
                     </div>
                     <div class="my-3">
                         <label for="email" class="mb-2">Email</label>
                         <input v-model="form.email" name="email"  type="text" id="email" class="form-control"/>
                     </div>

                     <div class="my-3">
                         <label for="password" class="mb-2">Password</label>
                         <input v-model="form.password" name="password"  type="number" id="password" class="form-control"/>
                     </div>
                     <div v-if="form.errors.password" v-text="form.errors.password"></div>

                     <button type="submit" class="btn btn-danger float-right">Regist</button>
                 </form>
             </div>
         </div>
     </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let form=useForm({
    name:'',
    email:'',
    password:''
});
let regist=()=>{
    form.post('/regist')
}
</script>

<style lang="scss" scoped>

</style>
