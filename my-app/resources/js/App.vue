<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <!-- Navigation Bar -->
      <v-toolbar-title>My App</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text>
        <router-link to="/" class="white--text">Welcome</router-link>
      </v-btn>
      <v-btn text>
        <router-link to="/login" class="white--text">Login</router-link>
      </v-btn>
      <v-btn text>
        <router-link to="/resgitre" class="white--text">Registre</router-link>
      </v-btn>
    </v-app-bar>

    <!-- Main Content -->
    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés ici */
</style>
