
<template>
    <Dashboard>
        <Link :href="route('Users.index')">
        <v-btn color="primary" variant="outlined" prepend-icon="mdi-keyboard-backspace">
            retour</v-btn>
        </Link>
        <v-form v-model="valid" @submit.prevent="submit">
            <v-container>
                <v-row>

                    <v-col cols="12" md="3">
                        <v-text-field v-model="name" :rules="nameRules" :counter="20" maxlength="20" label="Name"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="3">
                        <v-text-field v-model="email" :rules="emailRules" label="Email"
                            required></v-text-field>
                    </v-col>
                    <v-col cols="12" md="3">
                        <v-text-field  v-model="password" :rules="passwordRules" label="password"
                            required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="3">
                    <v-select name="role_id" id="role_id">
                        <option value="">--Please choose an option--</option>
                        <option value="user">Dog</option>
                        <option value="fournisseur">Cat</option>
                        <option value="admin">Hamster</option>
                        <option value="superviseur">Parrot</option>
                    </v-select>
                </v-col>
                </v-row>
                <v-btn class="right" type="submit">Enregistrer</v-btn>
            </v-container>
        </v-form>
        <v-snackbar v-model="snackbarVisible" :timeout="2000" color="success" outlined>
            User <strong>enregistré</strong>
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
            if (this.name && this.email && this.password && this.role_id) {

                axios.post(route('Users.create'), { name: this.name, email: this.email, password: this.password, role_id: this.role_id })
                    .then((response) => {
                        this.snackbarVisible = true;
                        router.visit(route('Users.index'));          
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

       emailRules: [
            value => {
                if (value) return true

                return 'email is required.'
            },

        ],
        passwordRules: [
            value => {
                if (value) return true

                return 'password is required.'
            },

        ],
        rolesRules: [
            value => {
                if (value) return true

                return 'roles is required.'
            },

        ],
    }),

}
</script>