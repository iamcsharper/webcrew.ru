export default (appSettings) => {
    appSettings.router.beforeEach((to, from, next) => {
        const user = appSettings.store.state.role;

        if (to.matched.some(record => record.meta.roles)) {
            if (to.meta.roles.includes(appSettings.store.state.role)) {
                next();
            } else {
                next({
                    name: to.meta.redirect
                });
            }
        } else {
            next();
        }
    });
}