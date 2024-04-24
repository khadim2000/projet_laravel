<script setup>
import { useForm } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/vue3';
import { VApp, VTextField, VBtn, VCheckbox, VCard, VCardText, VRow, VCol, VContainer } from 'vuetify/components';

// Définition des props pour les paramètres du composant
defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

// Configuration du formulaire avec useForm
const form = useForm({
  email: '',
  password: '',
  remember: false,
});

// Méthode de soumission
const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="10">
        <v-card class="elevation-6 mt-10">
          <v-card-text>
            <h4 class="text-center">Se connecter à votre compte</h4>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="8">
                <!-- Champ Email -->
                <v-text-field
                  v-model="form.email"  
                  label="Email"
                  outlined
                  dense
                  color="blue"
                  autocomplete="off"
                />
                
                <!-- Champ Mot de passe -->
                <v-text-field
                  v-model="form.password"  
                  label="Password"
                  outlined
                  dense
                  color="blue"
                  type="password"
                  autocomplete="off"
                />

                
                <v-checkbox
                  v-model="form.remember"  
                  label="Remember Me"
                  class="mt-n1"
                  color="blue"
                />

                <!-- Bouton Log in -->
                <v-btn color="blue" dark block tile @click="submit"> <!-- Événement de soumission -->
                  Log in
                </v-btn>
                
                <h5 class="text-center grey--text mt-4 mb-3">Or Log in using</h5>
                <div class="d-flex justify-space-between align-center mx-10 mb-16">
                  <v-btn depressed outlined color="grey">
                    <v-icon color="red">fab fa-google</v-icon>
                  </v-btn>
                  <v-btn depressed outlined color="grey">
                    <v-icon color="blue">fab fa-facebook-f</v-icon>
                  </v-btn>
                  <v-btn depressed outlined color="grey">
                    <v-icon color="light-blue lighten-3">fab fa-twitter</v-icon>
                  </v-btn>
                </div>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
