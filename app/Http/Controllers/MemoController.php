<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
/**
 * メモ一覧を表示
 * GET /memos
 */
public function index(Request $request)
{
    $search = $request->input('search');

    $memos = Memo::query();

    // 検索クエリがある場合は検索を実行
    if ($search) {
        $memos->where('title', 'LIKE', "%{$search}%");
    }

    // 日付の降順で並べ替えて取得
    $memos = $memos->orderBy('created_at', 'desc')->get();

    // ビューにメモデータを渡す
    return view('memos.index', compact('memos', 'search'));
}

    /**
     * 新規メモ作成フォームを表示
     * GET /memos/create
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * 新規メモを保存
     * POST /memos
     */
    public function store(Request $request)
    {
        // 新しいメモを作成・保存
        Memo::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // メモ一覧ページにリダイレクト
        return redirect()->route('memos.index')->with('success', 'メモが作成されました');
    }

    /**
     * 特定のメモを表示
     * GET /memos/{memo}
     */
    public function show(Memo $memo)
    {
        return view('memos.show', compact('memo'));
    }
}
