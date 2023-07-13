@extends('layouts.app') <!--「app.blade.php」の方が親となり、「index.blade.php」の方が子のビューファイルとなる-->
@section('content') <!--囲っている部分の名前付け-->
<div class='container'>
  <h2 class='page-header'>投稿内容を変更する</h2>
  {!! Form::open(['url' => '/post/update']) !!}
  <div class="form-group">
  {!! Form::hidden('id', $contents->id) !!}
  {!! Form::input('text', 'upContents', $contents->contents, ['required', 'class' => 'form-control']) !!}
  </div>
  <button type="submit" class="btn btn-primary pull-right">更新</button>
  {!! Form::close() !!}
</div>
@endsection
