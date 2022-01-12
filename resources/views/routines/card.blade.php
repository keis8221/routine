<div id="card">
    <div class="col-md mb-4">
        <div class="card routine-card">
            <div class="card-body ">
                <div class="row">
                    <h4 class="card-title col-6">{{ $routine->title }}</h4>
                    <p class="mb-1 col-4">
                        <span class="font-weight-lighter">{{ $routine->created_at->format('Y/m/d H:i') }}</span>
                    </p>
                </div>
                <div class="d-flex">
                    <div class="col-5">
                        <div class="welcome-section waves-effect" style="margin-left: 20px;">
                            <img src="public/assets/img/image02.jpg" class="img-responsive" alt=".."></img>
                            <div class="border"></div>                        
                        </div>
                    </div>
                    <div class="card-text col-7">
                        @foreach($routine->action as $action)
                            <div class="d-flex" style="margin-left: 40px;">
                                <div>
                                    <p class="text-black">{{ $action->things }}</p>
                                </div>
                                <div class="action-minutes d-flex">
                                    <i class="far fa-clock"></i>
                                    <p>{{ $action->minutes }}min</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end h-10">
                            <a @click="openModal">詳細を見る</a>
                        </div>

                        <!-- モーダルウィンドウ -->
                        <open-modal class="modal"  v-show="showContent" v-on:from-child="closeModal">
                        <div class='scroll-box' >
                            <div class="d-flex flex-wrap" id="item-top" v-for="item in items">
                            <div class="item-box">
                                <img class="incart" :src=item.mediumImageUrls alt="">
                                <p>@{{ item.itemName }}</p>
                            </div>
                            </div>
                        </div>
                        </open-modal>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comments"></i>
                    </div>
                    <div class="">
                        <a href="{{ route('users.show', ['id' => $routine->user_id]) }}" class="in-link text-dark">
                            <img class="user-icon rounded-circle" src="{{ $routine->user->profile_image }}">
                        </a>
                        <a href="{{ route('users.show', ['id' => $routine->user_id]) }}" class="font-weight-bold user-name-link text-dark mr-4">
                                {{ $routine->user->name }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>