<template>

      <Master :message="$page.props.message"></Master>
</template>

<script>
import Master from "./Layout/Master.vue";
    export default {
    components: { Master },
}
</script>

<style lang="scss" scoped>

</style>
