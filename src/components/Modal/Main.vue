<template>
  <el-dialog width="25%" title="Добавление платежа">
    <Body @submit-payment="$emit('create-payment', $event)"></Body>
  </el-dialog>
</template>

<script>
import Body from "./Body.vue";

export default {
  name: "Main",
  components: {
    Body
  }
}
</script>

<style scoped>

</style>