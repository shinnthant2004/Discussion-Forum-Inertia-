<template>
    <div>
         <Master>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card"  v-for="q in ques" :key="q.id">
                          <div class="card-body">
                            <Link href="/">{{ q.title  }}</Link>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
         </Master>
    </div>
</template>

<script>
import { ref } from '@vue/reactivity';
import Master from './Layout/Master.vue';
import { onMounted } from '@vue/runtime-core';
import { Link } from '@inertiajs/inertia-vue3';
    export default {
    props:{questions:Array},
    components: { Master,Link },
    setup(props){
        let ques=ref([]);
        onMounted(()=>{
            ques.value=props.questions
        });
        return {ques}
    }
}
</script>

<style lang="scss" scoped>

</style>
