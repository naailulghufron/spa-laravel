<template>
  <button :class="classes" @click="click(data)" title="Update">
    <span>
      <i class="fa fa-eye" aria-hidden="true"></i>
    </span>
    &nbsp;
    {{ name }}
  </button>
</template>
<script>
export default {
  props: {
    data: {},
    name: {},
    click: {
      type: Function,
      default: () => { }
    },
    classes: {
      type: Object,
      default: () => ({
        'btn': true,
        'btn-primary': true,
        'btn-sm': true,
      }),
    },
  }
}
</script>

<style lang="scss" scoped></style>
