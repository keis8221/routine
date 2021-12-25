<form id="nomal-post" method="POST" class="mx-auto form-control" action=" {{ route('routines.create') }} ">
  @csrf
  <div class="mb-3">
    <label class="form-label">Routine Title</label>
    <input type="text" class="form-control" name="routine_title" id="routine-title">
  </div>

  <div class="mb-3">
    <label class="form-label">Routine introduction</label>
    <textarea type="text" class="form-control" name="routine_introduction" id="routine-introduction"></textarea>
  </div>

  <div id="app">

    <div v-for="(action,index) in actions">

      <div class="form-component">
        <div class="form-component_title">
          何をする？
        </div>
        <div class="form-component_content">
          <input class="form-control" name="$action->things" type="text" v-model="action.do">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          説明
        </div>
        <div class="form-component_content">
          <textarea class="form-control" name="$action->introduction" type="text" v-model="action.introduction"></textarea>
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          時間(分)
        </div>
        <div class="form-component_content">
          <input class="form-control" name="$action->time" type="number" v-model="action.time">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          用いるアイテム
        </div>
        <div class="form-component_content">
          <input class="form-control" name="$action->item" type="text" v-model="action.item">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          アイテムのurl
        </div>
        <div class="form-component_content">
          <input class="form-control" name="$action->url" type="text" v-model="action.url">
        </div>
      </div>

      <div class="form-component">
        <div class="form-component_title">
          アイテムの画像
        </div>
        <div class="form-component_content">
          <input class="form-control" name="$action->image" type="text" v-model="action.image">
        </div>
      </div>
      <div class="float-right">
        <button class="btn rare-wind-gradient justify-content-end" v-on:click="deleteForm(index)">削除</button>
      </div>
    </div>

    <!-- 入力ボックスを追加するボタン ② -->
    <div class="float-right">
      <button class="btn rare-wind-gradient" type="button" v-on:click="addForm">追加する</button>
    </div>  
    <hr>


  </div>
  <!-- 入力されたデータを送信するボタン ③ -->
  <div class="mx-auto d-flex justify-content-center align-items-start">
    <button type="submit" class="btn rare-wind-gradient" @click="onSubmit">Submit</button>
  </div>
</form>