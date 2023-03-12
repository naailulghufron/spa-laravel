<template>
  <div>
    <div class="container-fluid" v-if="is_authenticated">
      <div>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
      </div>
    </div>

    <div v-else class="container">
      <login-component></login-component>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      is_authenticated: false
    }
  }
}
</script>

<style lang="scss" scoped></style>
