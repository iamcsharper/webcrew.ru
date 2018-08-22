require('./bootstrap');

import createApp from './app';

const {app, router, store} = createApp(window.Laravel.user);

new Promise((resolve, reject) => {
    router.onReady(() => {
        const matchedComponents = router.getMatchedComponents();
        if (!matchedComponents.length) {
            return reject({code: 404});
        }

        matchedComponents.map(Component => {
            if (Component.prefetch) {
                Component.prefetch(store, window.Laravel.context);
            }
        });

        resolve(app)

    }, reject)
})
    .then(app => {
        window.Vue = app;

        app.$store.commit('setUser', window.Laravel.user);

        app.$mount('#app');
    })
    .catch((err) => {
        console.error(err);
    });