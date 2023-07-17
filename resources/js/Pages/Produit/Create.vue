
<template>
    <Dashboard>
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
                        <v-text-field v-model="description" :rules="descriptionRules" label="Description"
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
            if (this.nom && this.description && this.quantite) {

                axios.post(route('creating'), { nom: this.nom, description: this.description, quantite: this.quantite })
                    .then((response) => {
                        router.visit(route('Produit'));
                        this.snackbarVisible = true;
                    })
            }

        }
    },
    data: () => ({
        snackbarVisible: false,
        valid: false,
        nom: '',
        description: '',
        quantite: '',
        nameRules: [
            value => {
                if (value) return true

                return 'Nom is required.'
            },
            value => {
                if (value?.length <= 20) return true

                return 'Nom must be less than 20 characters.'
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