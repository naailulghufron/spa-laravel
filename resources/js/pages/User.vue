<template>
  <div>
    <section v-if="name">
      <div>
        <router-link :to="{ name: 'User' }">Back</router-link>
        User {{ name }}
      </div>
    </section>
    <section v-else>
      <div>
        Daftar User

        <ul>
          <li v-for="user in users">
            <!-- Cara 1 -->
            <!-- {{ user.name }} -->
            <!-- Cara 2 -->
            <!-- <router-link to="/user/{{ user.name }}">{{ user.name }}</router-link> -->
            <!-- Cara 3 -->
            <!-- <router-link :to="profile_uri(user.name)">{{ user.name }}</router-link> -->
            <!-- Cara 4 -->
            <a href="" @click.prevent="sendData(user.name)">{{ user.name }}</a>
          </li>
        </ul>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ['name'],
  data() {
    return {
      users: [
        { id: 1, name: 'A1 asdfasf' },
        { id: 2, name: 'A2 rtreggd gdg' },
        { id: 3, name: 'A3 fsfew  ssf sdf' },
        { id: 4, name: 'A4 sfs fsdf sdfsf dsfs' },
        { id: 5, name: 'A5 sdf sfs fsfew' },
      ]
    }
  },
  methods: {
    profile_uri(name) {
      return '/user/' + name.toUpperCase()
    },
    sendData(d) {
      this.$router.push('/user/' + d.toUpperCase())
    }
  },
}
</script>

<style lang="scss" scoped></style>
