<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div id="chat-box" class="card-body bg-secondary">

                <div
                    class="media m-2 bg-light rounded"
                    v-for="chat in chat" :key="chat.id"
                >
                    <div class="media-body m-2">
                        <h5 class="mt-0 ">Hakim</h5>
                        {{ chat }}
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control"
                        v-model="message"
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
            chat: [],
            message: ''
        }
    },

    methods: {
        send() {
            this.chat.push(this.message);
            console.log(this.message);
            this.message = '';
        }
    },
}
</script>

<style lang="css" scoped>
#chat-box {
    overflow: auto;
    height: 30rem;
}
</style>
