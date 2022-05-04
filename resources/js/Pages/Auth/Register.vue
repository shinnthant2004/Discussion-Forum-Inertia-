<template>
    <div class="container mt-5">
     <div class="col-md-4 offset-4">
         <div class="card">
             <div class="card-header">Register Form</div>
             <div class="card-body">
                 <form>
                     <div class="form-group my-3">
                         <label for="email" class="mb-2">Email</label>
                         <input type="text" id="email" class="form-control"/>
                     </div>
                     <div class="form-group my-3">
                         <label for="password" class="mb-2">Password</label>
                         <input type="number" id="password" class="form-control"/>
                     </div>
                     <div class="form-group my-3">
                         <label for="image" class="mb-2">Choose Image</label>
                         <input type="file" id="image" class="form-control"/>
                     </div>
                     <button class="btn btn-danger float-right">Regist</button>
                 </form>
             </div>
         </div>
     </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

</style>
