<template>
    <div>
 <Master>
     <div class="card">
         <div class="card-header">Edit User</div>
         <div class="card-body">
             <form>
                 <div class="my-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control"/>
                 </div>
                 <div class="my-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control"/>
                 </div>
                 <div class="my-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control"/>
                 </div>
             </form>
         </div>
     </div>
 </Master>
    </div>
</template>

<script>
import Master from "./Layout/Master.vue";
    export default {
    components: { Master }
}
</script>

<style lang="scss" scoped>

</style>
