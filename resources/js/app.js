

import LikeComponent from './components/LikeComponent'
// import ModalComponent from './components/ModalComponent'
require('./bootstrap');

window.Vue = require('vue');

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

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
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('open-modal', require('./components/ModalComponent.vue').default);


var app = new Vue({
    el: '#app',
    components: {
        LikeComponent
    },
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        routine_title: "",
        routine_introduction: "",
        file: null,
        actions: [],
        items: [],
        showContent:false,
        show_id: "",
        detail_routine: []
    },
    methods: {
        addForm() {
            const additionalForm = {
                things: "",
                introduction: "",
                time: null,
                item_name: "",
                item_url: "",
                item_image: "",
            }
            this.actions.push(additionalForm); 
        },
        deleteForm(id) {
            this.actions.splice(id, 1);
        },
        selectedFile: function(e) {
            e.preventDefault();
            const files = e.target.files;
            this.file = files[0];
        },
        onSubmit() {
            const url = '/routine/store';
            const config = {
                headers: {
                  'content-type': 'multipart/form-data'
                }
            };
            let formData = new FormData();
            formData.append('routine_title',this.routine_title);
            formData.append('routine_introduction', this.routine_introduction);
            formData.append('file', this.file);
            formData.append('actions', JSON.stringify(this.actions));
            // console.log(formData.get('actions'));
            // for (let value of formData.entries()) { 
            //     console.log(value); 
            // }
            axios.post(url, formData, config)
                .then(response => {
                    location.href = '/routine'
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
        openModal: function(index){
            this.showContent = true
            this.search(index)
        },
        openModal2: function(index) {
            this.showContent = true
            this.show(index)
        },
        //モーダルウィンドウを閉じる
        closeModal: function() {
            this.showContent = false
        },
    }
});