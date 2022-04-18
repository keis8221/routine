<template>
  <div>
    <a
      type="button"
      class="in-link m-0 p-0 shadow-none"
      @click="clickLike"
    >
      <i v-if="gotToLike" class="fas fa-heart fa-lg fa-fw"
      :class="{'red-text':isLikedBy, 'animated heartBeat fast':gotToLike}"
      />
      <i v-else class="far fa-heart fa-lg fa-fw"
      :class="{'red-text':isLikedBy, 'animated heartBeat fast':gotToLike}"
      />
    </a>

    {{ countLikes }}
  </div>
</template>

<script>
  export default {
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
      initialCountLikes: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isLikedBy: this.initialIsLikedBy,
        countLikes: this.initialCountLikes,
        gotToLike: false
      }
    },
    methods: {
      clickLike() {
        if(!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }
        this.isLikedBy
          ? this.unlike()
          : this.like()
      },
      async like() {
        const response = await axios.put(this.endpoint)
        this.isLikedBy = true
        this.countLikes = response.data.countLikes
        this.gotToLike = true
      },
      async unlike() {
        const response = await axios.delete(this.endpoint)
        this.isLikedBy = false
        this.countLikes = response.data.countLikes
        this.gotToLike = false
      },
      hasfavorites() { //追加
        axios.get('/posts/' + this.post.id +'/hasfavorites')
        .then(res => {
            this.gotToLike = res.data;
        }).catch(function(error){
            console.log(error);
        });
      },
    },
  }
</script>