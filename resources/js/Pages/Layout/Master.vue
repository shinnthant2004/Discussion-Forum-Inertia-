<template>
    <div>
<Navbar></Navbar>
<!-- Sidebar -->
<div class="container">
 <div v-if="message && showNoti" class="alert">
    <div class="alert alert-success w-25" style="position: absolute;right: 0;z-index: 20;">
        <p class="p-0 m-0 fw-bold">{{ message }}</p>
    </div>
 </div>
    <div class="row my-4">
        <div class="col-md-4">
            <a href="" class="btn btn-primary w-100 p-2">Ask New Question!</a>
            <div class="card shadow">
                <div class="card-header">All Tags</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a >Web Development</a>
                        </li>
                        <li class="list-group-item">
                            <a >Web Development</a>
                        </li>
                        <li class="list-group-item">
                            <a >Web Development</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span class="badge bg-danger">Need Fixed!</span>
                          <span class="text-white ms-2">What is HTML?</span>
                        </div>
                        <div>
                          <a href="/delete" class="badge bg-danger text-right ms-1">Delete</a>
                          <a class="badge bg-warning text-right ms-1">Fixed</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, eum corporis tempora nesciunt laboriosam delectus adipisci consequatur sequi aut dolores voluptatibus, dolore aspernatur labore ipsa? Illo sunt laudantium odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, repellendus? Aliquam cupiditate minus harum cumque aperiam dolores! Ea quos autem porro sed, labore aliquid vero error incidunt aliquam, ad beatae? odit.</p>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i class="fas fa-heart text-danger"></i>
                            <small>4</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>8</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>
                            <small>10</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a class="badge bg-dark ms-2">Android</a>
                        <a class="badge bg-dark ms-2">Web</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>

             <div class="card my-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span class="badge bg-danger">Need Fixed!</span>
                          <span class="text-white ms-2">What is HTML?</span>
                        </div>
                        <div>
                          <a class="badge bg-danger text-right ms-1">Delete</a>
                          <a class="badge bg-warning text-right ms-1">Fixed</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, eum corporis tempora nesciunt laboriosam delectus adipisci consequatur sequi aut dolores voluptatibus, dolore aspernatur labore ipsa? Illo sunt laudantium odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, repellendus? Aliquam cupiditate minus harum cumque aperiam dolores! Ea quos autem porro sed, labore aliquid vero error incidunt aliquam, ad beatae? odit.</p>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i class="fas fa-heart text-danger"></i>
                            <small>4</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>8</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>
                            <small>10</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a class="badge bg-dark ms-2">Android</a>
                        <a class="badge bg-dark ms-2">Web</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>

             <div class="card my-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span class="badge bg-danger">Need Fixed!</span>
                          <span class="text-white ms-2">What is HTML?</span>
                        </div>
                        <div>
                          <a class="badge bg-danger text-right ms-1">Delete</a>
                          <a class="badge bg-warning text-right ms-1">Fixed</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, eum corporis tempora nesciunt laboriosam delectus adipisci consequatur sequi aut dolores voluptatibus, dolore aspernatur labore ipsa? Illo sunt laudantium odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, repellendus? Aliquam cupiditate minus harum cumque aperiam dolores! Ea quos autem porro sed, labore aliquid vero error incidunt aliquam, ad beatae? odit.</p>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i class="fas fa-heart text-danger"></i>
                            <small>4</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>8</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>
                            <small>10</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a class="badge bg-dark ms-2">Android</a>
                        <a class="badge bg-dark ms-2">Web</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Sidebar -->
    </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import Navbar from "./Navbar.vue";
defineProps({
    message:String
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
