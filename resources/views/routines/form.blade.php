<div id="">
  <div id="" class="form-control">
    <div class="mb-3" >
      <label class="form-label">タイトル</label>
      <input type="text" class="form-control" name="routine_title" v-model="routine_title">
    </div>

    <div class="mb-3" >
      <label class="form-label">ルーティンの説明</label>
      <textarea type="text" class="form-control" name="routine_introduction" v-model="routine_introduction"></textarea>
    </div>

    <div class="mb-3" >
      <label class="form-label">ルーティンの写真</label>
      <input type="file" class="form-control"  @change="selectedFile"></input>
    </div>

    <div v-for="(action,index) in actions">
      <div class="form-component mb-3">
        <div class="form-component_title">
          何をする？
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_things" type="text" v-model="action.things">
        </div>
      </div>
      
      <div class="form-component mb-3">
        <div class="form-component_title">
          説明
        </div>
        <div class="form-component_content">
          <textarea class="form-control" name="action_introduction" type="text" v-model="action.introduction"></textarea>
        </div>
      </div>

      <div class="form-component mb-3">
        <div class="form-component_title">
          時間(分)
        </div>
        <div class="form-component_content">
          <input class="form-control w-25" name="action_time" type="number" v-model="action.time">
        </div>
      </div>

      <div class="form-component mb-3">
        <div class="form-component_title">
          用いるアイテム
        </div>
        <div class="row">
          <div class="form-component_content col-9">
            <input class="form-control" name="action_item" type="text" v-model="action.item_name">
          </div>
          <button class="btn w-auto col-3" @click="openModal(index)">検索する</button>
        </div>
        
        <!-- モーダルウィンドウ -->
        <open-modal class="modal"  v-show="showContent" v-on:from-child="closeModal">
          <div class='d-flex flex-wrap'>
            <div class="scroll-box" style="width: 33%;" id="item-top" v-for="item in items">
              <div class="">
                  <img class="incart" :src=item.mediumImageUrls alt="">
                  <p>@{{ item.itemName }}</p>
                  <button class="btn" @click="select(index, item.itemName, item.itemUrl, item.mediumImageUrls)">選択</button>
              </div>
            </div>
          </div>
        </open-modal>
      </div>

      <div class="form-component mb-3">
        <div class="form-component_title">
          アイテムのurl
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_url" type="text" v-model="action.item_url">
        </div>
      </div>

      <div class="form-component mb-3">
        <div class="form-component_title">
          アイテムの画像
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_image"  type="text"  v-model="action.item_image">
        </div>
      </div>


      <div class="float-right">
        <button class="btn justify-content-end" v-on:click="deleteForm(index)">削除</button>
      </div>
    </div>
  

    <div class="float-right">
      <button class="btn" v-on:click="addForm">追加する</button>
    </div>  

    <hr>
    
    <div class="mx-auto d-flex justify-content-center align-items-start">
      <button type="submit" class="btn w-auto" @click="onSubmit" >Submit</button>
    </div>
  </div>

</div>