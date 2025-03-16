<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notepad | シンプルメモアプリ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #adb5bd;
            --danger: #e63946;
            --success: #2a9d8f;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-gray);
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .app-title i {
            margin-right: 0.5rem;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.7rem 1.2rem;
            border-radius: var(--radius);
            text-decoration: none;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.9rem;
        }

        .card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .card-meta {
            color: var(--dark-gray);
            font-size: 0.85rem;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
        }

        .card-meta i {
            margin-right: 0.3rem;
        }

        .card-content {
            margin-bottom: 1rem;
            color: var(--text-color);
            line-height: 1.5;
        }

        .card-actions {
            display: flex;
            justify-content: flex-end;
        }

        .card-actions a {
            margin-left: 0.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: var(--success);
            border-left: 5px solid var(--success);
        }

        .form-container {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-title {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--medium-gray);
            border-radius: var(--radius);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-secondary {
            background-color: var(--dark-gray);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--dark-gray);
            margin-bottom: 1rem;
        }

        .empty-state-text {
            margin-bottom: 1.5rem;
            color: var(--dark-gray);
        }

        footer {
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .card {
                padding: 1rem;
            }

            .form-container {
                padding: 1.5rem;
            }
        }
        .header-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .search-form {
        margin-right: 0.5rem;
    }

    .search-container {
        display: flex;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius);
        overflow: hidden;
        transition: all 0.3s;
        border: 1px solid transparent;
    }

    .search-container:focus-within {
        background-color: white;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        border-color: var(--accent-color);
    }

    .search-input {
        background: transparent;
        border: none;
        padding: 0.6rem 1rem;
        color: white;
        width: 200px;
        font-size: 0.9rem;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.8);
    }

    .search-container:focus-within .search-input {
        color: var(--text-color);
    }

    .search-container:focus-within .search-input::placeholder {
        color: var(--dark-gray);
    }

    .search-button {
        background: transparent;
        border: none;
        color: white;
        padding: 0 0.8rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-container:focus-within .search-button {
        color: var(--primary-color);
    }

    /* 検索結果表示用のスタイル */
    .search-results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        background-color: white;
        padding: 1rem 1.5rem;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    .search-term {
        font-weight: bold;
        color: var(--primary-color);
    }

    .clear-search {
        color: var(--text-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }

    .clear-search i {
        margin-right: 0.3rem;
    }

    .clear-search:hover {
        color: var(--primary-color);
    }

    /* レスポンシブ対応 */
    @media (max-width: 768px) {
        .header-actions {
            flex-direction: column;
            gap: 0.5rem;
            align-items: stretch;
            width: 100%;
        }

        header .container {
            flex-direction: column;
            gap: 1rem;
        }

        .search-container, .search-input {
            width: 100%;
        }

        .search-form {
            margin-right: 0;
            width: 100%;
        }

        .search-results-header {
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }
    }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1 class="app-title"><i class="fas fa-sticky-note"></i> Notepad</h1>
        <div class="header-actions">
            <form action="{{ route('memos.index') }}" method="POST" class="search-form">
                <div class="search-container">
                    <input
                        type="text"
                        name="search"
                        placeholder="タイトルで検索..."
                        class="search-input"
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <a href="{{ route('memos.create') }}" class="btn"><i class="fas fa-plus"></i> 新規メモ</a>
        </div>
    </div>
</header>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Notepad App - Laravel MVC学習用サンプルアプリケーション</p>
        </div>
    </footer>
</body>
</html>
