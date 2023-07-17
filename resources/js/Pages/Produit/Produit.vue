
<template>
  <Dashboard>
    <Link :href="route('Produit.create')">
    <v-btn prepend-icon="mdi-plus" color="success" variant="outlined">Create</v-btn>
    </Link>
    <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
    <v-data-table v-model:items-per-page="itemsPerPage" :search="search" :headers="headers" :items="produits"
      item-value="id" class="elevation-1">
      <template #item.action="{ item }">
        <v-btn small color="primary" prepend-icon="mdi-pencil-box-outline" @click="editProduit(item)">Edit</v-btn>
        &nbsp;
        <v-btn small color="error" prepend-icon="mdi-delete-forever" @click="deleteProduit(item)">Delete</v-btn>
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
    produit: Object
  },
  methods: {
    editProduit(item) {
      router.visit(route('Produit.edit'), { data: { id: item.value } });
    },
    deleteProduit(item) {
      axios.delete('/Produit/delete/'+item.value)
        .then(response => {
          
          this.produits = response.data.produits;
        })
        
    }

  },
  data() {
    return {
      search: '',
      itemsPerPage: 5,
      headers: [
        {
          title: 'Nom du produit',
          align: 'start',
          sortable: false,
          key: 'nom',
        },
        { title: 'Description', align: 'end', key: 'description' },
        { title: 'Quantite en stock', align: 'end', key: 'quantite_stock' },
        { title: 'Action', align: 'end', key: 'action' }
      ],
      produits: this.produit
    }
  },


}
</script>