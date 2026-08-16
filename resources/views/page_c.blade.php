<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>c 頁面 - 編輯資料</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f4f9; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 500px; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; text-align: left; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #10b981; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; width: 100%; }
        .btn-link { background: #6b7280; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <!-- 新增表單區塊 -->
    <div class="card">
        <h2>新增使用者資料</h2>
        <form action="/page_c" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">姓名 (Name):</label>
                <input type="text" id="name" name="name" required placeholder="請輸入姓名">
            </div>
            <div class="form-group">
                <label for="age">年齡 (Age):</label>
                <input type="number" id="age" name="age" required placeholder="請輸入年齡">
            </div>
            <div class="form-group">
                <label for="gender">性別 (Gender):</label>
                <select id="gender" name="gender" required>
                    <option value="男">男</option>
                    <option value="女">女</option>
                    <option value="其他">其他</option>
                </select>
            </div>
            <button type="submit" class="btn">送出並新增</button>
        </form>
    </div>

    <!-- 列表顯示區塊 -->
    <div class="card">
        <h2>目前資料庫使用者列表</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>年齡</th>
                    <th>性別</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->gender }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn-link">← 返回 a 頁面</a>
    </div>

</body>
</html>
