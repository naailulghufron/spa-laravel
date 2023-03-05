<template>
  <div class="card">
    <div class="card-body">
      <form @submit.prevent="handleSubmit" action="/user" method="POST">
        <div class="form-group">
          <label for="user_name">User Name</label>
          <input v-model="form.user_name" type="text" class="form-control form-control-sm" id="user_name"
            placeholder="Your name">
          <div class="error text-danger" v-if="errors.user_name">{{ errors.user_name[0] }}</div>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input v-model="form.email" type="email" class="form-control form-control-sm" id="email"
            placeholder="name@example.com">
          <div class="error text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
        </div>
        <div class="form-group mb-3">
          <label for="password">Password</label>
          <input v-model="form.password" type="password" class="form-control form-control-sm" id="password"
            placeholder="Uppercase + lower + number + symbol + min 8">
          <div class="error text-danger" v-if="errors.password">{{ errors.password[0] }}</div>
        </div>
        <div class="form-group mb-3">
          <button class="btn btn-sm btn-danger" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        user_name: '',
        email: '',
        password: '',
      },
      errors: {}
    }
  },
  methods: {
    handleSubmit() {
      //   console.log(this.form);
      axios.post('/api/users', this.form).then(res => {
        console.log(res);
        if (res.data.status) {
          //   alert(res.data.message)
          this.$noty.success(res.data.message)
          this.$router.push({
            name: 'User'
          })

        }
      }).catch(error => {
        this.$noty.error('Oops, something went wrong!')
        // console.log(error.response.status);
        if (error.response.status == 403) {
          this.errors = error.response.data.message
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped></style>
