<template>
    <div>
        <d-player :options="options"
                  @play="play"
                  ref="player">
        </d-player>
        <br><br>
        <button @click="switchHandle" class="btn btn-transparent-white btn-block btn-large">Изменить видео</button>
    </div>
</template>
<script>
    import VueDPlayer from 'vue-dplayer'
    import 'vue-dplayer/dist/vue-dplayer.css'
    export default {
        props: ['url', 'poster'],
        data() {
            let url = this.url;
            let poster = this.poster;
            return {
                options: {
                    video: {
                        url: url,
                        //pic: poster,
                        type: 'flv'
                    },
                    autoplay: false,
                    screenshot: true,
                    contextmenu: [
                        {
                            text: 'webcrew player'
                        }
                    ]
                },
                player: null,
            }
        },
        mounted() {
            this.player = this.$refs.player.dp
        },
        methods: {
            play() {
                console.log('play callback')
            },
            switchHandle() {
                this.player.switchVideo({
                    url: 'http://static.smartisanos.cn/common/video/video-jgpro.mp4',
                    type: 'mp4'
                });
                this.player.toggle();
            }
        },
        components: {
            'd-player': VueDPlayer
        }
    }
</script>