<template>
    <div class="hello">
        <h1>Тестовый компонент</h1>
        <h2>{{ msg }}</h2>
    </div>
</template>

<script>
    export default {
        name: 'Test',
        props: {
            msg: String
        }
    }
</script>

<style scoped>
    h1 {
        margin: 40px 0 0;
        color: #41B883;
    }
</style>