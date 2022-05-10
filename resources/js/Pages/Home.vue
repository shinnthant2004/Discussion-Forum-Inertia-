<template>
      <Master :success="$page.success">
               <div v-for="q in $page.props.questions" :key="q.id" class="card mb-3">
                <div class="card-header bg-dark">
                    <div class="d-flex justify-content-between">
                        <div>
                          <span class="badge bg-danger">Need Fixed!</span>
                          <span class="text-white ms-2">{{ q.title }}</span>
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
                            <p class="mb-0">{{ q.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3 d-flex">
                        <div class="ms-4">
                            <i class="fas fa-heart text-danger"></i>
                            <small>0</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-comment text-success"></i>
                            <small>{{ q.comment.length}}</small>
                        </div>
                        <div class="ms-4">
                            <i class="fas fa-star text-warning"></i>

                        </div>
                    </div>
                    <div class="col-md-7">
                     <Link v-for="tag in $page.props.tags" :key="tag.id" class="badge bg-dark ms-2">{{ tag.name }}</Link>
                    </div>
                    <div class="col-md-2">
                        <Link class="btn btn-sm btn-primary" href="/question/detail">View</Link>
                    </div>
                </div>
               </div>
      </Master>
</template>

<script setup>
import Master from "./Layout/Master.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<style lang="scss" scoped>

</style>
