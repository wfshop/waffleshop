<template>
    <textarea :value="value" />
</template>

<script>
    import CodeMirror from 'codemirror'
    import 'codemirror/mode/xml/xml'
    import 'codemirror/mode/css/css'
    import 'codemirror/mode/javascript/javascript'

    export default {
        name: "CodeMirror",

        props: ['name', 'mode', 'value'],

        mounted() {
            this.editor = CodeMirror.fromTextArea(this.$el, {
                lineNumbers: true,
                mode: this.mode
            })

            this.editor.on('change', e => {
                this.$emit('change', e)
            })
        }
    }
</script>
