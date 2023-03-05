<template>
  <div>
    <section>
      <div>
        <router-link :to="{ name: 'User' }">Back</router-link>
        <br>
        User : {{ userDetail.name }}
        <br>
        Email : {{ userDetail.email }}
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      userDetail: {},
    }
  },
  watch: {
    "$route": "getUsers"
  },
  mounted() {
    this.getUser()
  },
  methods: {
    getUser() {
      axios.get('/api/users/' + this.id).then((response) => {
        // console.log(response);
        this.userDetail = response.data.users
      })
    },
  },
}
</script>

<style lang="scss" scoped></style>
