<template>
    <div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li v-for="link in links" :key="link.id" class="page_item" :class="{active:link.active}">
        <Link class="page-link" :href="link.url">{{ link.label }}</Link>
    </li>
  </ul>
</nav>
    </div>
</template>

<script>
  import { Link } from '@inertiajs/inertia-vue3'
  export default {
     components:{Link},
     props:{links:Array}
  }
</script>

<style lang="scss" scoped>

</style>
