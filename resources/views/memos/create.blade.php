@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h2 class="form-title"><i class="fas fa-pen"></i> 新規メモ作成</h2>

        <form method="GET" action="{{ route('memos.store') }}">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">タイトル</label>
                <input type="text" id="title" name="title" class="form-control" required placeholder="メモのタイトルを入力">
            </div>

            <div class="form-group">
                <label for="content" class="form-label">内容</label>
                <textarea id="content" name="content" class="form-control" required placeholder="メモの内容を入力"></textarea>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <a href="{{ route('memos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> 戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> 保存
                </button>
            </div>
        </form>
    </div>
@endsection
