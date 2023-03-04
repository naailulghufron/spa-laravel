<template>
  <div>
    <section v-if="name">
      <div>
        User {{ name }}
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
  props: ['name']
}
</script>

<style lang="scss" scoped></style>
