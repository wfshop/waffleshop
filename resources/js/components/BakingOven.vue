<template>
    <div class="flex flex-col h-screen">
        <header class="px-5 flex justify-between bg-gray-200">
            <div>
                <h1>Untitled</h1>
                <p>Anonymous</p>
            </div>
            <div>
                <button @click="save">Save</button>
                <button>Settings</button>
                <button>Log in</button>
            </div>
        </header>
        <main class="flex-1 flex flex-col">
            <div class="flex h-64">
                <div class="w-4 h-full bg-gray-300"></div>
                <div class="relative flex-1 bg-gray-100">
                    <code-mirror
                        name="html"
                        mode="xml"
                        :value="defaultWaffle.html || waffle.html"
                        @change="e => handleChange('html', e)"
                    />
                </div>
                <div class="w-4 h-full bg-gray-300"></div>
                <div class="relative flex-1 bg-gray-100">
                    <code-mirror
                        name="css"
                        mode="css"
                        :value="defaultWaffle.css || waffle.css"
                        @change="e => handleChange('css', e)"
                    />
                </div>
                <div class="w-4 h-full bg-gray-300"></div>
                <div class="relative flex-1 bg-gray-100">
                    <code-mirror
                        name="js"
                        mode="javascript"
                        :value="defaultWaffle.js || waffle.js"
                        @change="e => handleChange('js', e)"
                    />
                </div>
            </div>
            <div class="w-full h-4 bg-gray-300"></div>
            <div class="flex-1">
                <preview :html="waffle.html" :css="waffle.css" :js="waffle.js" />
            </div>
            <div class="h-40">
                <console />
            </div>
        </main>
        <footer class="bg-gray-200">
            <div class="px-5">
                <button>Console</button>
            </div>
        </footer>
    </div>
</template>

<script>
    import debounce from 'lodash/debounce'

    export default {
        name: "BakingOven",

        props: ['default-waffle'],

        data() {
            return {
                waffle: {
                    id: null,
                    title: '',
                    html: '',
                    css: '',
                    js: ''
                }
            }
        },

        mounted() {
            if (this.defaultWaffle) {
                ['id', 'title', 'html', 'css', 'js'].forEach(field => this.waffle[field] = this.defaultWaffle[field])
            }
        },

        methods: {
            handleChange: debounce(function(editor, e) {
                this.waffle[editor] = e.getValue()
            }, 500),

            save() {
                if (this.shouldCreate()) {
                    this.create()
                } else {
                    this.update()
                }
            },

            shouldCreate() {
                return ! this.waffle.id
            },

            create() {
                axios.post('/waffles', {
                    html: this.waffle.html,
                    css: this.waffle.css,
                    js: this.waffle.js
                }).then(({ data }) => {
                    window.location.href = `/waffles/${data.id}`
                })
            },

            update() {
                axios.put(`/waffles/${this.waffle.id}`, {
                    html: this.waffle.html,
                    css: this.waffle.css,
                    js: this.waffle.js
                }).then(({ data }) => {
                    console.log(data)
                })
            }
        }
    }
</script>

<style scoped>

</style>
