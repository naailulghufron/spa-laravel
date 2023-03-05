<template>
  <div>
    <section>
      <div>
        <router-link :to="{ name: 'User' }">Back</router-link>
        <br>
        <!-- User : {{ userDetail.name }}
        <br>
        Email : {{ userDetail.email }} -->
        <form @submit.prevent="handleSubmit" action="/user" method="POST">
          <div class="form-group">
            <label for="user_name">User Name</label>
            <input v-model="form.user_name" type="text" class="form-control form-control-sm" id="user_name"
              placeholder="Your name">
            <div class="error text-danger" v-if="errors.user_name">{{ errors.user_name[0] }}</div>
          </div>
          <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input v-model="form.email" type="email" class="form-control form-control-sm" id="email"
              placeholder="name@example.com">
            <div class="error text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
          </div>
          <div class="form-group mb-3">
            <button class="btn btn-sm btn-danger" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ['id'],
  data() {
    return {
      form: {
        user_name: '',
        email: '',
      },
      errors: {},
      //   userDetail: {},
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
        console.log(response.data.users);
        this.form = {
          user_name: response.data.users.name,
          email: response.data.users.email,
        }
        this.userDetail = response.data.users
      })
    },
    handleSubmit() {
      //   console.log(this.form);
      axios.put('/api/users/' + this.id, this.form).then(res => {
        console.log(res);
        if (res.data.status) {
          //   alert(res.data.message)
          this.$noty.success(res.data.message)
          //   this.$router.push({
          //     name: 'User'
          //   })

        }
      }).catch(error => {
        this.$noty.error('Oops, something went wrong!')
        // console.log(error.response.status);
        if (error.response.status == 403) {
          this.errors = error.response.data.message
        }
      })
    }
  },
}
</script>

<style lang="scss" scoped></style>
