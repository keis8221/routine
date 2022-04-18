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
    methods :{
        clickEvent: function(){
            this.$emit('from-child'),
            document.getElementById('item-top').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        },
        stopEvent: function(){
            event.stopPropagation()
        }
    }
}
</script>