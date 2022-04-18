<div id="post_list">
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
                    <div class="col-6">
                        <div class="welcome-section waves-effect img-responsive" style="margin-left: 20px;">
                            <img src="{{ asset($routine->routine_image) }}"  alt=".."></img>         
                        </div>
                    </div>
                    <div class="card-text col-6">
                        <p>{{ $routine->routine_introduction }}</p>
                        <p>ルーティン内容</p>
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
                        <div class="d-flex justify-content-start h-10">
                            <a @click="openModal2({{$routine->id}})">詳細を見る</a>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-between mt-2">
                    <div class="d-flex">
                        <like-component
                        :initial-is-liked-by='@json($routine->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($routine->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('routines.like', ['routine' => $routine]) }}"
                        >
                        </like-component>
                        <a class="in-link p-1" href="{{ route('routines.show', ['routine' => $routine]) }}">
                            <i class="far fa-comments"></i>
                        </a>

                    </div>
                    <div class="">
                        <a href="{{ route('users.show',$routine->user_id) }}" class="in-link text-dark">
                            <img class="user-icon rounded-circle" src="{{ $routine->user->profile_image }}">
                        </a>
                        <a href="{{ route('users.show', $routine->user_id) }}" class="font-weight-bold user-name-link text-dark mr-4">
                                {{ $routine->user->name }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>