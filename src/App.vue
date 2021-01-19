<template>
    <div>
        <h1>{{ text }}</h1>

        <HelloWorld msg="Hello World !!!!!!!!!!!!!!!Vue Component" />
    </div>
</template>

<script>
    import HelloWorld from "./components/HelloWorld.vue";

    export default {
        name: "App",
        data: function () {
            return {
                text: 'Test'
            }
        },
        components: {
            HelloWorld
        }
    }
</script>

<style scoped>

</style>