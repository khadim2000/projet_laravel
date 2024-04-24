<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import {
  VAppBar,
  VAppBarNavIcon,
  VBtn,
  VMenu,
  VList,
  VListItem,
  VListItemTitle,
  VIcon,
} from 'vuetify/components';

// Gestion de l'état du menu déroulant
const isMenuOpen = ref(false);
</script>

<template>
  <v-app>
    <!-- Barre d'application en haut -->
    <v-app-bar app color="white" elevate-on-scroll>
      <!-- Bouton d'accueil -->
      <Link :href="route('dashboard')">
        <v-btn icon>
          <v-icon>mdi-home</v-icon> <!-- Icône d'accueil -->
        </v-btn>
      </Link>

      <!-- Espacement entre les éléments pour aligner les éléments de droite -->
      <div class="flex-grow-1"></div>

      <!-- Bouton avec icône pour le menu déroulant -->
      <v-menu
        offset-y
        :model-value="isMenuOpen.value"
        @update:model-value="isMenuOpen.value = $event"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn v-bind="attrs" v-on="on" @click="isMenuOpen.value = !isMenuOpen.value">
            <v-icon>mdi-dots-vertical</v-icon> <!-- Icône du menu -->
          </v-btn>
        </template>

        <!-- Contenu du menu déroulant -->
        <v-list>
          <!-- Lien vers le profil -->
          <v-list-item @click="isMenuOpen.value = false">
            <Link :href="route('profile.edit')">
              <v-list-item-title>Profil</v-list-item-title>
            </Link>
          </v-list-item>

          <!-- Lien pour ajouter un employé -->
          <v-list-item @click="isMenuOpen.value = false">
            <Link :href="route('employe.create')">
              <v-list-item-title>Ajouter un employé</v-list-item-title>
            </Link>
          </v-list-item>

          <!-- Lien de déconnexion -->
          <v-list-item @click="isMenuOpen.value = false">
            <Link :href="route('logout')" method="post" as="button">
              <v-list-item-title>Déconnexion</v-list-item-title>
            </Link>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <!-- Contenu principal -->
    <main class="main-content">
      <slot /> <!-- Emplacement pour le contenu principal -->
    </main>
  </v-app>
</template>

<style scoped>
.main-content {
  padding: 20px;
}

.flex-grow-1 {
  flex-grow: 1;
}

.v-btn {
  color: #333; /* Couleur du texte */
}

.v-app-bar {
  box-shadow: none;
}
</style>
