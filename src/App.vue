<template>
    <div>
        <h1>{{ text }}</h1>

        <HelloWorld msg="Hello World !!!!!!!!!!!!!!!Vue Component" />
        <Test msg="Проверка"></Test>
    </div>
</template>

<script>
    import HelloWorld from "./components/HelloWorld.vue";
    import Test from "./components/Test.vue";

    export default {
        name: "App",
        data: function () {
            return {
                text: 'Стартовый экран'
            }
        },
        components: {
            HelloWorld, Test
        }
    }
</script>

<style scoped>

</style>