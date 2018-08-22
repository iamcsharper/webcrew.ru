<template>
        <div class="modal-backdrop" @click="$emit('close')" transition="modal-fade">
            <div class="modal-wrapper">
                <div class="modal-dialog"
                     role="dialog"
                     aria-labelledby="modalTitle"
                     aria-describedby="modalDescription" @click.stop>
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="text-extra-large alt-font text-extra-dark-gray font-weight-600 no-margin-bottom">Подписка на курс {{ course.name }} </p>
                        </div>
                        <div class="modal-body">
                            Вы собираетесь приобрести место в группе на 30 дней. Подтвердите действие.
                            <p class="text-medium text-dark-gray no-margin-bottom">Стоимость: <b>{{ course.price }} рублей.</b></p>
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button class="btn btn-orange" @click="onYes($event, close)">да, я согласен</button>
                            <button class="btn btn-transparent-light-gray" @click="onNo($event, close)">я отказываюсь</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['course', 'onYes', 'onNo'],
        methods: {
            close() {
                this.$emit('close');
            }
        }
    }
</script>