<template>
<div class="form">
    <p class="mt-3">Usuários:</p>
    <input type="text" v-model="new_user" placeholder="Insira um usuário">
    <ul>
        <li v-for="user in users" :key="user">
            {{ user }}
        </li>
    </ul>
    <button class="btn btn-primary text-white" @click="exportPDF">Cadastrar</button>
</div>
</template>

<script>
export default {
    data() {
        return {
            new_user: '',
            users: [],
        };
    },

    mounted() {
        this.fetchUsers();
    },

    methods: {
        fetchUsers() {
            axios.get('/users')
            .then(response => this.users = response.data.collection)
            .catch(error => {});
        },

        submitUser() {
            axios.get('/submit-user', { params: {
                user: this.user
            }})
            .then(response => {
                alert(response.data.collection);
            })
            .catch(error => {
                alert(error)
            });
        },

        removeUser() {
            axios.get('/remove-user', { params: {
                user: this.user
            }})
            .then(response => {
                alert(response.data.collection);
            })
            .catch(error => {
                alert(error)
            });
        },
    }
}
</script>

<style lang="scss">
.form{
    background: #90e1fa;
    padding: 70px;
}
</style>