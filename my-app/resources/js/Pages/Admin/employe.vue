<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3'; // Pour gérer le formulaire
import { Link } from '@inertiajs/vue3';
import { VTextField, VBtn } from 'vuetify/components';

const form = useForm({
    nom: '',
    prenom: '',
    matricule: '',
    idrole: '', // Vous devriez avoir un moyen de sélectionner le rôle (par exemple, un menu déroulant)
});

const submit = () => {
    form.post(route('employe.store'), { // Route vers le contrôleur
        onSuccess:
        () => {
                // Traitez ce qui doit être fait après le succès, par exemple rediriger vers une page de succès
                console.log("Employé ajouté avec succès");
            },
            onError: (errors) => {
                console.log("Erreur lors de l'ajout de l'employé", errors);
            },
        },
    );
};

</script>

<template>
  <div>
    <h1>Ajouter un Employé</h1>

    <form @submit.prevent="submit">
      <!-- Champ pour le nom -->
      <v-text-field
        v-model="form.nom"
        label="Nom"
        :error-messages="form.errors.nom"
      />

      <!-- Champ pour le prénom -->
      <v-text-field
        v-model="form.prenom"
        label="Prénom"
        :error-messages="form.errors.prenom"
      />

      <!-- Champ pour le matricule -->
      <v-text-field
        v-model="form.matricule"
        label="Matricule"
        :error-messages="form.errors.matricule"
      />

      <!-- Champ pour le rôle -->
      <v-text-field
        v-model="form.idrole"
        label="ID Rôle"
        :error-messages="form.errors.idrole"
      />

      <v-btn type="submit">Ajouter</v-btn>
    </form>
  </div>
</template>
