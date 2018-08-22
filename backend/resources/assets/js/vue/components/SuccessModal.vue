<template>
    <div class="modal-backdrop" @click="$emit('close')" transition="modal-fade">
        <div class="modal-wrapper">
            <div class="modal-dialog modal-confirm" @click.stop>
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="fas fa-check"></i>
                        </div>
                        <button type="button" class="close" @click="then($event, close)">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Отлично!</h4>
                        <p v-html="message"></p>
                        <button class="btn btn-success" @click="then($event, close)"><span>{{ button }}</span> <i class="fas fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message', 'button', 'then'],
        methods: {
            close() {
                this.$emit('close');
            }
        }
    }
</script>