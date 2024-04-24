<script setup>
import {
  VApp,
  VContainer,
  VRow,
  VCol,
  VBtn,
  VIcon,
} from 'vuetify/components';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  canLogin: {
    type: Boolean,
  },
});
</script>

<template>
  <VApp>
    <VContainer fluid class="background-image">
      <VRow align="center" justify="center" style="height: 100vh; overflow: hidden;">
        <VCol cols="12" sm="8" md="6" class="text-center">
          <!-- Titre centré sur l'image de fond -->
          <h1 style="color: white; font-size: 2em; text-shadow: 2px 2px 4px #000;">
            Welcome to DMI
          </h1>

          <!-- Texte secondaire -->
          <p style="color: white; text-shadow: 1px 1px 2px #000;">
            Access your management tools and resources from here.
          </p>

          <!-- Bouton de connexion -->
          <VBtn
            v-if="canLogin"
            href="/login"
            color="primary"
            text
            style="transition: all 0.3s;"
          >
            <VIcon icon="mdiLogin" class="me-1" />
            Log in
          </VBtn>
        </VCol>
      </VRow>
    </VContainer>
  </VApp>
</template>

<style scoped>
.background-image {
  background-image: url('https://img.freepik.com/photos-gratuite/bouchent-concept-entreprise-mains_23-2149151165.jpg');
  background-size: cover;
  background-position: top center; /* Décalage vers le haut pour masquer le bas de l'image */
  background-repeat: no-repeat;
}

.text-center {
  text-align: center;
}
</style>
