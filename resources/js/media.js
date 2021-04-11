window.Vue = require('vue');

Vue.component('add-media', require('./components/AddMedia.vue').default);

import VueElementLoading from 'vue-element-loading'

Vue.component('VueElementLoading', VueElementLoading)

const app = new Vue({
    el: '#app',

    methods: {
        checkFile(event, type) {

            let formats = []
            if(type == 1)
            {
                formats = ['image/jpeg', 'image/jpg', 'image/png']
                if (!formats.includes(event.target.files[0]['type'])) {
                    return false;
                }
                return event.target.files[0]
            }

            if(type == 2)
            {
                formats = ['video/mp4', 'video/mpg', 'video/webm']
                if (!formats.includes(event.target.files[0]['type'])) {
                    return false;
                }
                return event.target.files[0]
            }
    

        }
    }
});
