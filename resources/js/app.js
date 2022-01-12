/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('modal-component', require('./component/ModalComponent.vue').default);


import Modal from "./components/ModalComponent";



var form = new Vue({
    el: '#form',
    components: {
        Modal
    },
    headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
    data: {
        routine_title: "",
        routine_introduction: "",
        routine_image: "",
        actions: [],
        items: [],
        showContent:false
    },
    methods: {
        addForm() {
            const additionalForm = {
                things: "",
                introduction: "",
                time: "",
                item_name: "",
                item_url: "",
                item_image: "",
            }
            this.actions.push(additionalForm); 
        },
        deleteForm(id) {
            this.actions.splice(id, 1);
        },
        onSubmit() {
            const url = '/routine/store';
            const params = {
                routine_title: this.routine_title,                
                routine_introduction: this.routine_introduction,
                routine_image: this.routine_image,
                actions: this.actions
            };
            axios.post(url, params)
                .then(response => {
                    location.href="{{ route('routines.index') }}";
                })
                .catch(error => {
                    // 失敗した時
                });
        }, 
        //楽天APIによる商品検索
        search(index){
            const url = '/search';
            const params = {
                item_name: this.actions[index].item_name
            }
            axios.post(url, params)
                .then(response => {
                    this.items = response.data;

                })
                .catch(error => {
                    // 失敗した時
                });
        },
        //楽天APIのアイテムを選択した際の処理
        select(index, item_name, item_url, item_image){
            this.actions[index].item_name = item_name
            this.actions[index].item_url = item_url
            this.actions[index].item_image = item_image
            this.closeModal()
        },
        //モーダルウィンドウを開く
        openModal(index){
            this.showContent = true
            this.search(index)
        },    
        //モーダルウィンドウを閉じる
        closeModal() {
            this.showContent = false
        },
    }
});

const card = new Vue({
    el: '#card',
    data: {
        showContent:false,
    },
    methods: {
        //モーダルウィンドウを開く
        openModal() {
            this.showContent = true
        },    
        //モーダルウィンドウを閉じる
        closeModal() {
            this.showContent = false
        }
    }
});
