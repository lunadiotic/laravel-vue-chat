<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div id="chat-box" class="card-body bg-secondary">

                <div
                    class="media m-2 bg-light rounded"
                    v-for="chat in chat.content" :key="chat.id"
                >
                    <div class="media-body m-2">
                        <h5 class="mt-0 ">{{ chat.user.name }}</h5>
                        {{ chat.message }}
                    </div>

                </div>

            </div>

            <div class="card-footer">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control"
                        v-model="input_message"
                        @keyup.enter="send()"
                        @keydown="typing()"
                    >
                </div>
                <p v-if="active_user">{{ active_user.name }} typing...</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            chat: {
                content: []
            },
            input_message: '',
            active_user: false,
            typing_timer: false
        }
    },

    props: {
        session:  Object
    },

    mounted() {
        Echo.private('channel-chat')
            .listen('ChatSent', (result) => {
                this.chat.content.push(result);
            }).listenForWhisper('typing', (result) => {
                this.active_user = result;

                if (this.typing_timer) {
                    clearTimeout(this.typing_timer);
                }

                this.typing_timer = setTimeout(() => {
                    this.active_user = false
                }, 2000)
            });
        this.scroll();
    },

    updated() {
        this.scroll();
    },

    methods: {
        send() {
            if (this.input_message.lenght != 0) {
                this.chat.content.push({
                    message: this.input_message,
                    user: this.session
                });
                axios.post('/send', {
                    message: this.input_message
                }).then((result) => {
                    this.input_message = ''
                }).catch((err) => {
                    console.log(err);
                });
            }
        },

        typing() {
            Echo.private('channel-chat')
                .whisper('typing', this.session);
        },

        scroll() {
            let container = document.getElementById("chat-box");
            let scrollHeight = container.scrollHeight;
            container.scrollTop = scrollHeight;
        }
    },
}
</script>

<style lang="css" scoped>
#chat-box {
    overflow: auto;
    height: 300px;
}
</style>
