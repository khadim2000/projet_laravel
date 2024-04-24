<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { VApp, VCard, VCardTitle, VCardText, VCardActions, VTextField, VForm, VBtn } from 'vuetify/components';
import 'vuetify/styles'; // Nécessaire pour les styles de Vuetify
import { createVuetify } from 'vuetify';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <!-- Utilisez VApp pour contenir le contenu avec Vuetify -->
        <VApp>
            <VCard class="pa-4" outlined color="primary" dark>
                <VCardTitle>
                    Register
                </VCardTitle>

                <VCardText>
                    <VForm @submit.prevent="submit">
                        <!-- Nom -->
                        <VTextField
                            label="Name"
                            v-model="form.name"
                            type="text"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        
                        <!-- Email -->
                        <VTextField
                            label="Email"
                            v-model="form.email"
                            type="email"
                            required
                            autocomplete="username"
                        />
                        
                        <!-- Mot de passe -->
                        <VTextField
                            label="Password"
                            v-model="form.password"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
                        
                        <!-- Confirmation du mot de passe -->
                        <VTextField
                            label="Confirm Password"
                            v-model="form.password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
                        
                        <!-- Lien vers la page de connexion -->
                        <VCardActions>
                            <Link :href="route('login')" class="underline text-sm">
                                Already registered?
                            </Link>
                        </VCardActions>
                        
                        <!-- Bouton de soumission -->
                        <VCardActions>
                            <VBtn
                                color="secondary"
                                :disabled="form.processing"
                                @click="submit"
                            >
                                Register
                            </VBtn>
                        </VCardActions>
                    </VForm>
                </VCardText>
            </VCard>
        </VApp>
    </GuestLayout>
</template>
