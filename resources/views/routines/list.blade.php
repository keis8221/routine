@if($routines->isEmpty())
  @include('not_exist', ['message' => '投稿がありません。'])
@endif

@foreach($routines as $routine)
  @include('routines.card', compact('routines'))
@endforeach