<template>
    <div class="container my-5">
      <div class="col-md-4 offset-4">
          <div class="card">
              <div class="card-header text-center">Login</div>
              <div class="card-body">
                  <form @submit.prevent="login">
                      <div class="my-3">
                          <label for="email" class="my-2">Enter Email</label>
                          <input v-model="form.email" type="email" name="email" id="email" :class="['form-control',form.errors.email ?'border border-danger' :'']">
                           <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger"></div>
                      </div>
                      <div class="my-3">
                          <label for="password" class="my-2">Enter Password</label>
                          <input v-model="form.password" type="password" name="password" id="password" :class="['form-control',form.errors.email ?'border border-danger' :'']">
                           <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger"></div>
                      </div>
                       <button type="submit" class="btn btn-success float-right" :disabled="form.processing">
                         <div v-show="form.processing" class="spinner-border spinner-border-sm text-white" role="status">
                               <span class="visually-hidden">Loading...</span>
                         </div>
                           <div v-if="form.processing">Wait</div>
                           <div v-else>Regist</div>
                        </button>
                  </form>
              </div>
          </div>
      </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form=useForm({
    email:'',
    password:''
});
function login(){
    form.post('/login')
}
</script>

<style lang="scss" scoped>

</style>
