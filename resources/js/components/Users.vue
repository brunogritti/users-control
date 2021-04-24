<template>
<div class="form">
    <p class="mt-3">Usuários:</p>
    <input type="text" v-model="new_user" placeholder="Insira um usuário">
    <button class="btn btn-primary text-white" @click="submitUser">Cadastrar</button>
    <ul>
        <li v-for="user in users" :key="user">
            {{ user.name }}
            <button class="btn btn-danger text-white" @click="removeUser(user.id)">Remover</button>
        </li>
    </ul>
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
            axios.get('/json/users')
            .then(response => this.users = response.data)
            .catch(error => {});
        },

        submitUser() {
            axios.get('/json/submit-user', { params: {
                user: this.new_user
            }})
            .then(response => {
                this.fetchUsers()
            })
            .catch(error => {
                alert(error)
            });
        },

        removeUser(user_id) {
            axios.get('/json/remove-user', { params: {
                user_id: user_id
            }})
            .then(response => {
                this.fetchUsers()
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