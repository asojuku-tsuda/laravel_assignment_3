<?php

namespace Database\Seeders;

use App\Models\Memo;
use Illuminate\Database\Seeder;

class MemoSeeder extends Seeder
{
    /**
     * シーダーの実行
     */
    public function run(): void
    {
        // サンプルメモデータの作成
        $memos = [
            [
                'title' => '買い物リスト',
                'content' => "・牛乳\n・卵\n・パン\n・バナナ",
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'title' => '会議メモ',
                'content' => "3月20日のプロジェクト会議\n\n・新機能のスケジュール確認\n・バグ修正の優先順位\n・次回のリリース日程",
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'title' => 'Laravel学習メモ',
                'content' => "MVCアーキテクチャについて\n\n・Model: データとビジネスロジック\n・View: ユーザーインターフェース\n・Controller: リクエスト処理",
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'title' => '誕生日プレゼントのアイデア',
                'content' => "友人の誕生日プレゼント候補\n\n・本（最近興味があった小説）\n・キーホルダー\n・映画のチケット",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // 各メモをデータベースに登録
        foreach ($memos as $memo) {
            Memo::create($memo);
        }
    }
}
