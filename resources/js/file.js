window.Vue = require('vue');
Vue.component('upload-zip', require('./components/UploadZip.vue').default);

import VueElementLoading from 'vue-element-loading'



Vue.component('VueElementLoading', VueElementLoading)

const app = new Vue({
    el: '#app',

    methods : {
        checkFile(event) {
       
                    let formats = ['application/zip']

                    if (!formats.includes(event.target.files[0]['type'])) {
                        return false;
                    }
                    return event.target.files[0]
              
              

            




        },
    }
});
