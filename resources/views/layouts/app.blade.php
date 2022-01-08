<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" rel="stylesheet" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" >

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Modal window of PortalVue -->
    <script src="http://unpkg.com/vue/dist/vue.js"></script>
    <script src="http://unpkg.com/portal-vue"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<style>
#content{
    z-index:10;
    width:70%;
    padding: 1em;
    background:#fff;
    border-radius: 10px;
    height: 100%;
}

#overlay{
    /*　要素を重ねた時の順番　*/

    z-index:1;

    /*　画面全体を覆う設定　*/
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.5);

    /*　画面の中央に要素を表示させる設定　*/
    display: flex;
    align-items: center;
    justify-content: center;

}
.v-enter-active, .v-leave-active {
    transition: opacity .5s;
}
.v-enter, .v-leave-to {
    opacity: 0;
}
/* .scroll-box {
    width: 100%;
} */
.item-box {
    width: 33%;
    color: #4c4c4c ;
    font-weight: bold;
    text-align: center;
    margin-top: 24px;
    padding: 24px 8px;
    font-size: 1.1em;
    background-color: #fefefe ;
}
/* img.incart{
   width: 100%;
   display: block;
   margin: 0 auto;
   height: auto;
   object-fit: cover;
} */
.modal{
  overflow-y: auto;
  max-height: 100%;
}

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg rare-wind-gradient ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Shearu') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style=""></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('routines.index') }}">投稿一覧</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('routines.create') }}">投稿する</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}さん
                                </a>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a href="{{ route('users.show', ['id' => Auth::user()->id]) }}">Myroutine</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        <form id="logout-button" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                        @endauth
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>

Vue.component('open-modal',{
    template : `
        <div id="overlay" v-on:click="clickEvent">
            <div id="content" v-on:click="stopEvent">
            <p><slot></slot></p>
            <button v-on:click="clickEvent">close</button>
            </div>
        </div>
        `,
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
        
    },
})

var app = new Vue({
    el: '#app',
    headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
    data: {
        routine_title: "",
        routine_introduction: "",
        actions: [],
        items: [],
        showContent:false,
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
        openModal: function(index){
            this.showContent = true
            this.search(index)
        },    
        //モーダルウィンドウを閉じる
        closeModal: function(){
            this.showContent = false
        },
    }
});
</script>
</body>
