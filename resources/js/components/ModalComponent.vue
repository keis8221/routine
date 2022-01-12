<template>
    <div id="overlay" v-on:click="clickEvent">
        <div id="content" v-on:click="stopEvent">
        <p><slot></slot></p>
        <button class="btn" v-on:click="clickEvent">close</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            methods:{
                clickEvent() {
                    this.$emit('from-child'),
                    document.getElementById('item-top').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                },
                stopEvent() {
                    event.stopPropagation()
            }
            }
        }
    }

// Vue.component('open-modal',{
//     methods :{
//         clickEvent: function(){
//             this.$emit('from-child'),
//             document.getElementById('item-top').scrollIntoView({
//                 behavior: 'smooth',
//                 block: 'start'
//             });
//         },
//         stopEvent: function(){
//             event.stopPropagation()
//         }
        
//     },
// })
</script>
