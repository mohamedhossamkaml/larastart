<template>
<div class="container devel-pady" v-if="$gate.isAdmin()">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
        // console.log('Component mounted.')
    }
}
</script>

<style lang="sass" scoped>

</style>
