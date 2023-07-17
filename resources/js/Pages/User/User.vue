
<template>
    <Dashboard>
      <Link :href="route('Users.create')">
      <v-btn prepend-icon="mdi-plus" color="success" variant="outlined">Create</v-btn>
      </Link>
      <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
      <v-data-table v-model:items-per-page="itemsPerPage" :search="search" :headers="headers" :items="fournisseurs"
        item-value="id" class="elevation-1">
        <template #item.action="{ item }">
          <v-btn small color="primary" prepend-icon="mdi-pencil-box-outline" @click="editFournisseur(item)">Edit</v-btn>
          &nbsp;
          <v-btn small color="error" prepend-icon="mdi-delete-forever" @click="deleteFournisseur(item)">Delete</v-btn>
        </template>
      </v-data-table>
  
    </Dashboard>
  </template>
  <script>
  import Dashboard from '../Dashboard.vue';
  import { Link, router } from '@inertiajs/vue3';
  
  export default {
    components: {
      Dashboard,
      Link
    },
    props: {
      fournisseur: Object
    },
    methods: {
      editFournisseur(item) {
        router.visit(route('Fournisseur.edit'), { data: { id: item.value } });
      },
      deleteFournisseur(item) {
        axios.delete('/Fournisseur/delete/'+item.value)
          .then(response => {
            
            this.fournisseurs = response.data.fournisseurs;
          })
          
      }
  
    },
    data() {
      return {
        search: '',
        itemsPerPage: 5,
        headers: [
          {
            title: 'Nom',
            align: 'start',
            sortable: false,
            key: 'name',
          },
          { title: 'Email', align: 'start', key: 'email' },
          { title: 'Roles', align: 'start', key: 'role-id' },
          { title: 'Action', align: 'start', key: 'action' }
        ],
        fournisseurs: this.fournisseur
      }
    },
  
  
  }
  </script>