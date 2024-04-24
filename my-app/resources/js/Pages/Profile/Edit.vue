<script setup>
import { ref } from 'vue';
import {
  VApp,
  VMain,
  VContainer,
  VCard,
  VCardTitle,
  VCardText,
  VSpacer,
  VBtn,
} from 'vuetify/components';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

const mustVerifyEmail = ref(false);
const status = ref('');
</script>

<template>
  <VApp>
    <Head title="Profile" />

    <AuthenticatedLayout>
      <template #header>
        <VCardTitle class="text-h5 text-primary">
          Profile
        </VCardTitle>
      </template>

      <VMain>
        <VContainer class="py-12">
          <VCard class="bg-secondary lighten-4">
            <VCardText>
              <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
              />
            </VCardText>
          </VCard>

          <VCard class="mt-4 bg-info lighten-3">
            <VCardText>
              <UpdatePasswordForm />
            </VCardText>
          </VCard>

          <VCard class="mt-4 bg-danger lighten-3">
            <VCardText>
              <DeleteUserForm />
            </VCardText>
          </VCard>
        </VContainer>
      </VMain>
    </AuthenticatedLayout>
  </VApp>
</template>
