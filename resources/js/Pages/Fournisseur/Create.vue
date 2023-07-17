
<template>
    <Dashboard>
        <Link :href="route('Fournisseur.index')">
        <v-btn color="primary" variant="outlined" prepend-icon="mdi-keyboard-backspace">
            retour</v-btn>
        </Link>
        <v-form v-model="valid" @submit.prevent="submit">
            <v-container>
                <v-row>

                    <v-col cols="12" md="4">
                        <v-text-field v-model="nom" :rules="nameRules" :counter="30" maxlength="30" label="Nom"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field v-model="adresse" :rules="adresseRules" label="Adresse"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field  v-model="telephone" :rules="telephoneRules" label="Telephone"
                            required></v-text-field>
                    </v-col>
                </v-row>
                <v-btn class="right" type="submit">Enregistrer</v-btn>
            </v-container>
        </v-form>
        <v-snackbar v-model="snackbarVisible" :timeout="2000" color="success" outlined>
            Produit <strong>enregistré</strong>
        </v-snackbar>
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
    methods: {
        submit() {
            if (this.nom && this.adresse && this.telephone) {

                axios.post(route('Fournisseur.create'), { nom: this.nom, adresse: this.adresse, telephone: this.telephone })
                    .then((response) => {
                        this.snackbarVisible = true;
                        router.visit(route('Fournisseur.index'));          
                    })
            }

        }
    },
    data: () => ({
        snackbarVisible: false,
        valid: false,
        nom: '',
        adresse: '',
        telephone: '',
        nameRules: [
            value => {
                if (value) return true

                return 'Nom is required.'
            },
            value => {
                if (value?.length <= 30) return true

                return 'Nom must be less than 30 characters.'
            },
        ],

        adresseRules: [
            value => {
                if (value) return true

                return 'adresse is required.'
            },

        ],
        telephoneRules: [
            value => {
                if (value) return true

                return 'telephone is required.'
            },

        ],
    }),

}
</script>