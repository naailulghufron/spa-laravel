<template>
  <div>
    <section v-if="$route.params.name">
      <div>
        User {{ $route.params.name }}
      </div>
    </section>
    <section v-else>
      <div>
        Daftar User
      </div>
    </section>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped></style>
