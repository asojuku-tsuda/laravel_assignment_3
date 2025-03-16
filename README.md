# セットアップ
sh setup.sh

# マイグレーションの実行（テーブル作成）
php artisan migrate

# シーダーの実行（テストデータ投入）
php artisan db:seed
