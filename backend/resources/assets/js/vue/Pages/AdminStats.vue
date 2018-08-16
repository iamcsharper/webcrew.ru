<template>
    <div>
        <line-chart></line-chart>
    </div>
</template>

<script>
    import VueChartJS from 'vue-chartjs'

    export default {
        components: {
            lineChart: {
                extends: VueChartJS.Bar,
                mounted () {
                    this.renderChart({
                        labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль'],
                        datasets: [
                            {
                                label: 'Посещения сайта',
                                backgroundColor: '#f87979',
                                data: [1000, 1200, 500, 1400, 1000, 1900, 1800]
                            }
                        ]
                    }, {responsive: true, maintainAspectRatio: false})
                }
            }
        },
        data: function () {
            return {
                errors: [],
            }
        },
        computed: {
            user() {
                return this.$store.getters.user;
            },
        },
        methods: {},
        mounted() {

        },
    }

</script>