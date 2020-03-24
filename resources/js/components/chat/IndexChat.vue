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
                    >
                </div>
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
            input_message: ''
        }
    },

    props: {
        session:  Object
    },

    mounted() {
        Echo.channel('channel-chat')
            .listen('ChatSent', (result) => {
                this.chat.content.push(result);
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
                    console.log(result);
                    console.log(this.session)
                    this.input_message = ''
                }).catch((err) => {
                    console.log(err);
                });
            }
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
