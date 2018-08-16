<template>
    <div>
        <div class="alert alert-danger alert-dismissable border-none box-shadow"
             v-if="errors.length">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <h4 class="alert-heading">Произошли ошибки:</h4>
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>

        <table class="table table-borderless table-light table-responsive margin-15px-bottom">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users">
                <td>{{ index }}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>
                    <button @click="remove(user.id, index)" class="btn btn-very-small btn-light"><i
                            class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            </tbody>
        </table>

        <button class="btn btn-large btn-black" @click="update">
            <span v-if="!is_refresh">Загрузить</span>
            <span v-if="is_refresh"><i class="fas fa-spinner"></i> Загрузка...</span>
        </button>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: [],
                is_refresh: false,
                errors: [],
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
        },
        methods: {
            update: function () {
                this.is_refresh = true;
                axios.get('/api/admin.show').then((response) => {
                    if (!response.data.success) {
                        this.errors = response.data.errors;
                    } else {
                        this.users = response.data.users;
                        this.is_refresh = false;
                    }
                });
            },
            remove: function (id, index) {
                this.is_refresh = true;
                axios.patch('/api/admin.remove/' + id, {
                    _method: 'PATCH'
                }).then((response) => {
                    if (!response.data.success) {
                        this.errors = response.data.errors;
                    } else {
                        this.users.splice(index, 1);
                        this.is_refresh = false;
                    }
                });
            }
        },
        mounted() {
            this.update();
        },
    }
</script>