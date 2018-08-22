import _ from 'lodash'

const createAsyncMutation = (type) => ({
    SUCCESS: `${type}_SUCCESS`,
    FAILURE: `${type}_FAILURE`,
    PENDING: `${type}_PENDING`,
    loadingKey: _.camelCase(`${type}_PENDING`),
    stateKey: _.camelCase(`${type}_DATA`),
    errorsKey: _.camelCase(`${type}_ERRORS`)
});

// HOME
export const GET_CLASSES = createAsyncMutation('GET_CLASSES');
export const GET_MY_CLASSES = createAsyncMutation('GET_MY_CLASSES');
export const GET_MY_JOB_CLASSES = createAsyncMutation('GET_MY_JOB_CLASSES');