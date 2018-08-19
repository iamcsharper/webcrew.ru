<script>
    export default {
        name: 'modal',
        data() {
            return {
                visible: false,
            }
        },

        props: {
            header: {
                type: String,
                default: 'Modal header',
            },
            body: {
                type: String,
                default: 'Modal body',
            },
            footer: {
                type: String,
                default: '<button type="button" class="btn btn-green" @click="hide">Close me!</button>',
            },
        },

        methods: {
            show () {
                this.visible = true;
            },
            hide() {
                this.visible = false;
            },
        },
    };
</script>

<template>
    <transition name="modal-fade">
        <div class="modal-backdrop" @click="hide" v-if="visible">
            <div class="modal-wrapper">
                <div class="modal-dialog"
                     role="dialog"
                     aria-labelledby="modalTitle"
                     aria-describedby="modalDescription" @click.stop>
                    <div class="modal-content">
                        <div class="modal-header">
                            {{ header }}
                        </div>
                        <div class="modal-body">
                            {{ body }}
                        </div>
                        <div class="modal-footer">
                            {{ footer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>