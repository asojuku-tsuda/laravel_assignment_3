<?php

use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

// メインページはメモ一覧にリダイレクト
Route::get('/', function () {
    return redirect()->route('memos.index');
});

// メモリソースのルート定義（GETとPOSTのみ）
Route::get('/memos', [MemoController::class, 'index'])->name('memos.index');
Route::get('/memos/create', [MemoController::class, 'create'])->name('memos.create');
Route::post('/memos', [MemoController::class, 'store'])->name('memos.store');
Route::get('/memos/{memo}', [MemoController::class, 'show'])->name('memos.show');
