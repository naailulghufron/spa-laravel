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
        <ul>
          <li v-for="user in users">
            <!-- {{ user.name }} -->
            <router-link :to="profile_uri(user.name)">{{ user.name }}</router-link>
            <!-- <router-link to="/user/{{ user.name }}">{{ user.name }}</router-link> -->
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
        { id: 1, name: 'A1' },
        { id: 2, name: 'A2' },
        { id: 3, name: 'A3' },
        { id: 4, name: 'A4' },
        { id: 5, name: 'A5' },
      ]
    }
  },
  methods: {
    profile_uri(name) {
      return '/user/' + name
    },
  },
}
</script>

<style lang="scss" scoped></style>
