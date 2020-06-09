import Vue from 'vue'
import BakingOven from "./components/BakingOven"
import CodeMirror from "./components/CodeMirror"
import Preview from "./components/Preview";
import Console from "./components/Console";

require('./bootstrap')

Vue.component('baking-oven', BakingOven)
Vue.component('code-mirror', CodeMirror)
Vue.component('preview', Preview)
Vue.component('console', Console)

const app = new Vue({
    el: '#app'
})
