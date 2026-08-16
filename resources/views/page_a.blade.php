<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>a 頁面 - 登入</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f4f4f9; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
        .btn { background: #4f46e5; color: white; padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 6px; display: inline-block; font-weight: bold; margin: 0.5rem 0; }
        .btn-c { background: #10b981; }
    </style>
</head>
<body>
    <div class="card">
        <h1>歡迎 Test 系統</h1>
        <p>點擊下方按鈕進入列表頁</p>
        <div>
            <a href="/page_b" class="btn">登入進 b 頁面</a>
        </div>
        <div>
            <a href="/page_c" class="btn btn-c">進入 c 頁面編輯資料</a>
        </div>
    </div>
</body>
</html>
