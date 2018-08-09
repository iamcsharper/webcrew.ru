<template>
    <div class="table-responsive">
        <button class="btn btn-large btn-white" @click="update">
            <span v-if="!is_refresh">Загрузить</span>
            <span v-if="is_refresh"><i class="fas fa-spinner"></i> Загрузка...</span>
        </button>
        <table class="table table-borderless">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users">
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>
                    <button @click="remove(user.id, index)" class="btn btn-very-small btn-light"><i
                            class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: [],
                is_refresh: false,
            }
        },
        methods: {
            update: function () {
                this.is_refresh = true;
                axios.get('/admin/show').then((response) => {
                    if (response.data.errors.length) {
                        alert("Произошли ошибки: \n" + response.data.errors.join("\n"));
                    } else {
                        this.users = response.data.users;
                        this.is_refresh = false;
                    }
                });
            },
            remove: function (id, index) {
                this.is_refresh = true;
                axios.patch('/admin/remove/' + id, {
                    _method: 'PATCH'
                }).then((response) => {
                    if (response.data.errors.length) {
                        alert("Произошли ошибки: \n" + response.data.errors.join("\n"));
                    } else {
                        this.users.pop(index);
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