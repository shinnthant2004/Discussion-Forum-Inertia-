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
            <a href="/question/create" class="btn btn-primary w-100 p-2">Ask New Question!</a>

            <div class="card shadow" v-show="isProfile">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <Link href="/profile/edituser"><i class="fas fa-bars me-2"></i>Edit Profile</Link>

                        </li>
                        <li class="list-group-item">
                            <Link href="/profile/question"><i class="fas fa-award me-2"></i>Your Questions</Link>
                        </li>
                    </ul>
                </div>
            </div>
                   <div v-show="!isProfile" class="card shadow">
                <div class="card-header">All Tags</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="tag in $page.props.tags" :key="tag.id">
                            <Link href>{{ tag.name }}</Link>
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
import { computed, onMounted } from "@vue/runtime-core";
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
let isProfile=computed(()=>{
    let url=location.pathname;
    let exp="/profile/.*"
    let res=url.match(exp);
    if(res!=null){
        return true
    }else{
        return false
    }
})
</script>

<style lang="scss" scoped>

</style>
