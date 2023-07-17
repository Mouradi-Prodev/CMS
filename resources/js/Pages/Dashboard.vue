<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>

    <v-card>
      <v-layout>
        <v-navigation-drawer image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg" permanent theme="dark">
          <v-list nav>
            <Link :href="route('Users.index')">
            <v-list-item prepend-icon="mdi-account-multiple-check" title="Users" value="clockin"></v-list-item>
            </Link>
            <Link :href="route('Produit')">
            <v-list-item prepend-icon="mdi-beer-outline" title="Produits" value="Produit"></v-list-item>
            </Link>
            <Link :href="route('Fournisseur.index')">
            <v-list-item prepend-icon="mdi-account-group" title="Fournisseurs" value="Fournisseur"></v-list-item>
            </Link>
            
          </v-list>
        </v-navigation-drawer>
        <v-main>
          <main>
            <slot />
          </main>
        </v-main>
      </v-layout>
    </v-card>


  </AuthenticatedLayout>
</template>
