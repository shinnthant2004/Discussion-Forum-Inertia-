<template>
    <div>
     <Master>
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
                    <!-- Like -->
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
                        <Link class="btn btn-sm btn-primary" href="/question/detail">View</Link>
                    </div>
                </div>
                <!-- LikeEnd -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, eum corporis tempora nesciunt laboriosam delectus adipisci consequatur sequi aut dolores voluptatibus, dolore aspernatur labore ipsa? Illo sunt laudantium odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, repellendus? Aliquam cupiditate minus harum cumque aperiam dolores! Ea quos autem porro sed, labore aliquid vero error incidunt aliquam, ad beatae? odit.</p>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" width="50" style="border-radius:50%" />
                                    Shinn
                                    <small>Commented 1min ago</small>
                                </div>
                                <div class="card-body">
                                    <p>hello min ga lar par</p>
                                </div>
                            </div>
                             <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" width="50" style="border-radius:50%" />
                                    Shinn
                                    <small>Commented 1min ago</small>
                                </div>
                                <div class="card-body">
                                    <p>hello min ga lar par</p>
                                </div>
                            </div>
                             <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" width="50" style="border-radius:50%" />
                                    Shinn
                                    <small>Commented 1min ago</small>
                                </div>
                                <div class="card-body">
                                    <p>hello min ga lar par</p>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>

          </div>
       </Master>
    </div>
</template>

<script setup>
import Master from './Layout/Master.vue'
import { Link } from '@inertiajs/inertia-vue3';
</script>

<style lang="scss" scoped>

</style>
