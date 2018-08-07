<template>

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