@extends('layouts.app')

@section('content')
    @if(isset($search) && $search)
        <div class="search-results-header">
            <div>
                <h2 style="margin-bottom: 0.3rem; color: var(--text-color);">検索結果</h2>
                <p>「<span class="search-term">{{ $search }}</span>」を含むメモ: {{ count($memos) }}件</p>
            </div>
            <a href="{{ route('memos.index') }}" class="clear-search">
                <i class="fas fa-times-circle"></i> 検索をクリア
            </a>
        </div>
    @else
        <h2 style="margin-bottom: 1.5rem; color: var(--text-color);">メモ一覧</h2>
    @endif

    @if(count($memos) > 0)
        <div class="memo-grid">
            @foreach($memos as $memo)
                <div class="card">
                    <h3 class="card-title">{{ $memo->title }}</h3>
                    <div class="card-meta">
                        <i class="far fa-calendar-alt"></i> {{ $memo->created_at->format('Y年m月d日 H:i') }}
                    </div>
                    <div class="card-content">
                        {{ \Illuminate\Support\Str::limit($memo->content, 100) }}
                    </div>
                    <div class="card-actions">
                        <a href="{{ route('memos.show', $memo->id) }}" class="btn btn-sm">
                            <i class="fas fa-eye"></i> 詳細を見る
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            @if(isset($search) && $search)
                <i class="fas fa-search"></i>
                <p class="empty-state-text">「{{ $search }}」に一致するメモは見つかりませんでした。</p>
                <a href="{{ route('memos.index') }}" class="btn btn-primary">
                    <i class="fas fa-list"></i> すべてのメモを表示
                </a>
            @else
                <i class="far fa-sad-tear"></i>
                <p class="empty-state-text">メモがありません。新しいメモを作成してください。</p>
                <a href="{{ route('memos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> 最初のメモを作成
                </a>
            @endif
        </div>
    @endif
@endsection
