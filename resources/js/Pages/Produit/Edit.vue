
<template>
    <Dashboard>
        <v-snackbar v-model="snackbarVisible" :timeout="4000" color="success" outlined>
            Produit <strong>enregistré</strong>
        </v-snackbar>
        <Link :href="route('Produit')">
        <v-btn color="primary" variant="outlined" prepend-icon="mdi-keyboard-backspace">
            retour</v-btn>
        </Link>
        <v-form v-model="valid" @submit.prevent="submit">
            <v-container>
                <v-row>

                    <v-col cols="12" md="4">
                        <v-text-field v-model="nom" :rules="nameRules" :counter="20" maxlength="20" label="Nom"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field type="text" v-model="description" :rules="descriptionRules" label="Description"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field type="number" v-model="quantite" :rules="quantiteRules" label="Quantite en stock"
                            required></v-text-field>
                    </v-col>
                </v-row>
                <v-btn class="right" type="submit">Enregistrer</v-btn>
            </v-container>
        </v-form>
    </Dashboard>
</template>
<script>
import Dashboard from '../Dashboard.vue';
import { Link, router } from '@inertiajs/vue3';
import axios from 'axios';
export default {
    components: {
        Dashboard,
        Link
    },
    props:{
        produit:Object
    },
    methods:{
        test(){
            console.log(this.produit.id);
        },
        submit(){
            axios.put(route('Produit.update'),{id:this.id,nom:this.nom,description:this.description,quantite_stock:this.quantite})
            .then((response)=>{
                router.visit(route('Produit'));
                this.snackbarVisible = true;
            })
        }
    },
    mounted(){
        this.id = this.produit.id;
       this.nom = this.produit.nom;
       this.description = this.produit.description;
       this.quantite = this.produit.quantite_stock;
    },
    data: () => ({
        id:null,
        snackbarVisible: false,
        valid: false,
        nom:'',
        description: '',
        quantite: '',
        nameRules: [
            value => {
                if (value) return true

                return 'Nom is required.'
            },
            value => {
                if (value?.length <= 20) return true

                return 'Nom must be less than 10 characters.'
            },
        ],

        descriptionRules: [
            value => {
                if (value) return true

                return 'description is required.'
            },

        ],
        quantiteRules: [
            value => {
                if (value) return true

                return 'quantite is required.'
            },

        ],
    }),

}
</script>