<template>
  <div>
    <!-- <section v-if="id_name">
      <div>
        <router-link :to="{ name: 'User' }">Back</router-link>
        User {{ userDetail.name }}
      </div>
    </section> -->
    <section>
      <!-- <section v-else> -->
      <div>
        Daftar User
        <br>
        <router-link to="/user/create">Create</router-link>
        <br>

        <!-- <ul> -->
        <!-- <li v-for="user in users"> -->
        <!-- Cara 1 -->
        <!-- {{ user.name }} -->
        <!-- Cara 2 -->
        <!-- <router-link to="/user/{{ user.name }}">{{ user.name }}</router-link> -->
        <!-- Cara 3 -->
        <!-- <router-link :to="profile_uri(user.name)">{{ user.name }}</router-link> -->
        <!-- Cara 4 -->
        <!-- <a href="" @click.prevent="sendData(user.id)">{{ user.name }}</a> -->
        <!-- </li> -->
        <!-- </ul> -->

        <table class="table table-sm table-bordered">
          <thead>
            <tr>
              <th>User Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users">
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>
                <button @click.prevent="sendData(user.id)" class="btn btn-sm btn-danger">Show</button>
                <button class="btn btn-sm btn-danger">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  //   props: ['id_name'],
  data() {
    return {
      users: [],
      userDetail: {},
      //   users: [
      //     { id: 1, name: 'A1 asdfasf' },
      //     { id: 2, name: 'A2 rtreggd gdg' },
      //     { id: 3, name: 'A3 fsfew  ssf sdf' },
      //     { id: 4, name: 'A4 sfs fsdf sdfsf dsfs' },
      //     { id: 5, name: 'A5 sdf sfs fsfew' },
      //   ]
    }
  },
  //   watch: {
  //     "$route": "getUsers"
  //   },
  mounted() {
    this.getUsers()
    // axios.get('/api/users').then((response) => {
    //   console.log(response);
    //   this.users = response.data.users
    // })

    // fetch('/api/users').then(res => res.json()).then(data => {
    //   console.log(data);
    //   this.users = data.users
    // })
  },
  methods: {
    getUsers() {
      axios.get('/api/users').then((response) => {
        // console.log(response);
        this.users = response.data.users
        // if (this.id_name) {
        //   console.log(this.users);
        //   console.log(this.id_name);
        //   console.log(this.id_name[0]);
        //   this.userDetail = this.users.filter(u => u.id == this.id_name)[0]
        //   console.log(this.user);
        //   console.log(this.id_name);
        // }
      })
    },
    // routing to profile (link)
    profile_uri(id) {
      return '/user/' + id
    },
    // routing to profile (method)
    sendData(id) {
      this.$router.push({
        name: 'Profile',
        params: { id }
      })
    }
  },
}
</script>

<style lang="scss" scoped></style>
