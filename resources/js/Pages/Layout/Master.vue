<template>
    <div>
<Navbar></Navbar>
<!-- Sidebar -->
<div class="container">
 <div v-if="success && showNoti" class="alert">
    <div class="alert alert-success w-25" style="position: absolute;right: 0;z-index: 20;">
        <p class="p-0 m-0 fw-bold">{{ success }}</p>
    </div>
 </div>
    <div class="row my-4">
        <div class="col-md-4">
            <a href="" class="btn btn-primary w-100 p-2">Ask New Question!</a>
            <div class="card shadow">
                <div class="card-header">All Tags</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="tag in $page.props.tags" :key="tag.id">
                            <Link>{{ tag.name }}</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
         <slot></slot>
        </div>
    </div>

</div>
<!-- End Sidebar -->
    </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted } from "@vue/runtime-core";
import Navbar from "./Navbar.vue";
defineProps({
    success:String
});
let showNoti=ref(false);
onMounted(()=>{
    showNoti.value=true;
    setTimeout(() => {
       showNoti.value=false;
    }, 2000);
})
</script>

<style lang="scss" scoped>

</style>
