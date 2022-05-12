<template>
 <Master>
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <form class="card shadow p-3 text-center">
                     <h3 class="text-primary mb-3">Create Question</h3>
                     <div class="my-2">
                         <input type="text" class="form-control" placeholder="Enter Title"/>
                     </div>
                     <div class="my-2 d-flex" style="margin:auto">
                         <div class="mx-5" v-for="t in $page.props.tags" :key="t.id">
                             <label class="d-block">{{ t.name }}</label>
                             <input value="{{ t.id }}" type="checkbox"/>
                         </div>
                     </div>
                     <div class="my-2">
                         <textarea class="form-control" placeholder="Enter question"></textarea>
                     </div>
                     <div>
                          <!-- <button type="submit" class="btn btn-primary float-right" :disabled="form.processing">
                         <div v-show="form.processing" class="spinner-border spinner-border-sm text-white" role="status">
                               <span class="visually-hidden">Loading...</span>
                         </div>
                           <div v-if="form.processing">Wait</div>
                           <div v-else>Login</div>
                        </button> -->
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
import Master from './Layout/Master.vue'
export default {
      components:{Master}
}
</script>

<style lang="scss" scoped>

</style>
