<template>
    <Master>
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <Pagination :links="$page.props.saveQuestions.links"></Pagination>
                    </div>
                </div>
            <div class="row my-3">
                <div class="col-12">
                   <div class="card shadow my-2" v-for="q in $page.props.saveQuestions.data" :key="q.id">
                       <div class="card-body">
                           <p class="text-primary fw-bold">{{ q.title }}</p>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </Master>
</template>

<script>
import Pagination from './Components/Pagination.vue'
import Master from './Layout/Master.vue'
    export default {
        props:{saveQuestions:Array},
      components:{Master, Pagination}
    }
</script>

<style lang="scss" scoped>

</style>
