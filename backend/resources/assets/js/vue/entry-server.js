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

        Promise.all(matchedComponents.map(Component => {
            if (Component.asyncData) {
                return Component.asyncData({
                    store,
                    route: router.currentRoute
                });
            }
        })).then(() => {
            context.state = store.state;

            resolve(app)
        }).catch(reject);
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