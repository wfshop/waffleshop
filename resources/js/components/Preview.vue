<template>
    <div><iframe></iframe></div>
</template>

<script>
    export default {
        name: "Preview",

        props: ['html', 'css', 'js'],

        mounted() {
            this.render()
        },

        watch: {
            html() {
                this.render()
            },
            css() {
                this.render()
            },
            js() {
                this.render()
            }
        },

        methods: {
            content() {
                return `<!doctype html>
<head><style>${this.css}</style></head>
<body>
    ${this.html}
    <script>
        (function () {
            const originalLog = console.log
            console.log = function() {
                window.parent.postMessage({
                    type: 'waffle-console',
                    method: 'log',
                    args: [].slice.apply(arguments)
                }, '*')

                originalLog.apply(console, arguments)
            }
        })()

        try {
            (function () {
              ${this.js}
            })()
        } catch (e) {}
    <\/script>
</body>
</html>`
            },

            render() {
                const iframe = this.createIframe()
                this.$el.replaceChild(iframe, this.$el.firstChild)
                iframe.contentWindow.document.open()
                iframe.contentWindow.document.write(this.content())
                iframe.contentWindow.document.close()
            },

            createIframe() {
                const iframe = document.createElement('iframe')
                return iframe
            }
        }
    }
</script>

<style scoped>

</style>
