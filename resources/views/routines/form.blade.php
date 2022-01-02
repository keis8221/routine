
  <!-- <div class="mb-3">
    <label class="form-label">Routine Title</label>
    <input type="text" class="form-control" name="routine_title" id="routine-title">
  </div>

  <div class="mb-3">
    <label class="form-label">Routine introduction</label>
    <textarea type="text" class="form-control" name="routine_introduction" id="routine-introduction"></textarea>
  </div> -->

  <div id="app" class="form-control">
    <div class="mb-3" >
      <label class="form-label">タイトル</label>
      <input type="text" class="form-control" name="routine_title" v-model="routine_title">
    </div>

    <div class="mb-3" >
      <label class="form-label">ルーティンの説明</label>
      <textarea type="text" class="form-control" name="routine_introduction" v-model="routine_introduction"></textarea>
    </div>
    <div v-for="(action,index) in actions">

      <div class="form-component">
        <div class="form-component_title">
          何をする？
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_things" type="text" v-model="action.things">
        </div>
      </div>
      
      <div class="form-component">
        <div class="form-component_title">
          説明
        </div>
        <div class="form-component_content">
          <textarea class="form-control" name="action_introduction" type="text" v-model="action.introduction"></textarea>
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          時間(分)
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_time" type="number" v-model="action.time">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          用いるアイテム
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_item" type="text" v-model="action.item_name">
        </div>
        <button class="btn rare-wind-gradient" v-on:click="search">検索する</button>

      </div>

      <!-- 楽天API検索結果 -->
      <!-- <div class='form-component'>
        <div class="form-control" v-for="item in items">
          
        </div>
      </div> -->

      <div class="form-component">
        <div class="form-component_title">
          アイテムのurl
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_url" type="text" v-model="action.item_url">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          アイテムの画像
        </div>
        <div class="form-component_content">
          <input class="form-control" name="action_image" type="text" v-model="action.item_image">
        </div>
      </div>


      <div class="float-right">
        <button class="btn rare-wind-gradient justify-content-end" v-on:click="deleteForm(index)">削除</button>
      </div>
    </div>
  </div>
  <div class="float-right">
    <button class="btn rare-wind-gradient" v-on:click="addForm">追加する</button>
  </div>  

  <hr>
  <label>actionsの中身</label>
  <div v-text="actions"></div>


<div class="mx-auto d-flex justify-content-center align-items-start">
  <button form="normal-post" type="submit" class="btn rare-wind-gradient" @click="onSubmit" >Submit</button>
</div>

