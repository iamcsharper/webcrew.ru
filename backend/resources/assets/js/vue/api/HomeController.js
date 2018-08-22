import qs from 'qs'
import axios from 'axios'

export default {
    url: '/api/home.',

    /**
     * Get subscribed classes of current user
     * @param method API method
     * @param store - current vuex store
     * @param mutationTypes - name consts for mutation
     * @param query - query strings object array
     * @param params - axios params
     * @param concat - should we concat or replace classes?
     * @returns {Promise}
     */
    _classes({method, store, mutationTypes, query, params, concat}) {
        return new Promise((resolve, reject) => {
            axios.get(this.url + method + '?' + qs.stringify(query), params || {})
                .then(response => {
                    const current = store.state[mutationTypes.stateKey] || 0;

                    if (concat) {
                        store.commit(mutationTypes.SUCCESS, current.concat(response.data.classes));
                    } else {
                        store.commit(mutationTypes.SUCCESS, response.data.classes);
                    }

                    resolve(response.data.classes);
                })
                .catch(error => {
                    store.commit(mutationTypes.FAILURE, [ error ]);

                    reject(error);
                });
        });
    },

    /**
     * Get all educational classes
     * @param params
     * @returns {Promise}
     */
    getClasses(params) {
        params.method = 'getClasses';
        return this._classes(params);
    },

    /**
     * Get subscribed classes of current user
     * @param params
     * @returns {Promise}
     */
    getMyClasses(params) {
        params.method = 'getMyClasses';
        return this._classes(params);
    },

    getMyJobClasses(params) {
        params.method = 'getMyJobClasses';
        return this._classes(params);
    },
};