@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0; color: var(--text-color);">メモ詳細</h2>
        <a href="{{ route('memos.index') }}" class="btn btn-sm">
            <i class="fas fa-arrow-left"></i> 一覧に戻る
        </a>
    </div>

    <div class="card" style="padding: 2rem;">
        <h2 class="card-title" style="font-size: 1.8rem; margin-bottom: 1rem;">{{ $memo->title }}</h2>

        <div class="card-meta" style="margin-bottom: 1.5rem;">
            <i class="far fa-calendar-alt"></i> 作成日: {{ $memo->created_at->format('Y年m月d日 H:i') }}
            @if($memo->updated_at->ne($memo->created_at))
                <span style="margin-left: 1rem;">
                    <i class="fas fa-edit"></i> 更新日: {{ $memo->updated_at->format('Y年m月d日 H:i') }}
                </span>
            @endif
        </div>

        <div class="card-content" style="white-space: pre-line; margin-bottom: 2rem; font-size: 1.1rem;">
            {{ $memo->content }}
        </div>
    </div>
@endsection
