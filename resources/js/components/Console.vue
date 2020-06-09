<template>
    <div class="h-full bg-gray-900 text-white">
        <h2>Console</h2>
    </div>
</template>

<script>
    export default {
        name: "Console",

        mounted() {
            window.addEventListener('message', e => {
                if (e.data.type === 'waffle-console') {
                    this.handleConsoleEvent(e)
                }
            })
        },

        methods: {
            handleConsoleEvent(e) {
                this.$el.innerHTML += `<div>${e.data.method} - ${e.data.args.join(' ')}</div>`
            }
        }
    }
</script>

<style scoped>

</style>
