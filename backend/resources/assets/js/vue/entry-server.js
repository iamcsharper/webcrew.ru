/* global context, dispatch */

import createApp from './app';
import renderVueComponentToString from 'vue-server-renderer/basic';

const {app, router, store } = createApp(context.user);

new Promise((resolve, reject) => {
    router.push(context.url);
    router.onReady(() => {
        const matchedComponents = router.getMatchedComponents();
        if (!matchedComponents.length) {
            return reject({ code: 404 });
        }

        matchedComponents.map(Component => {
            if (Component.prefetch) {
                Component.prefetch(store, context);
            }
        });

        resolve(app)

    }, reject);
})
    .then(app => {
        renderVueComponentToString(app, (err, res) => {
            dispatch(res);
        });
    })
    .catch((err) => {
        dispatch(err);
    });