<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>c 頁面 - 編輯與管理資料</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f4f9; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 800px; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; text-align: left; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #10b981; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; width: 100%; font-size: 1rem; }
        .btn:hover { background: #059669; }
        .btn-update { background: #3b82f6; color: white; border: none; padding: 0.4rem 0.8rem; border-radius: 4px; cursor: pointer; font-size: 0.85rem; }
        .btn-update:hover { background: #2563eb; }
        .btn-delete { background: #ef4444; color: white; border: none; padding: 0.4rem 0.8rem; border-radius: 4px; cursor: pointer; font-size: 0.85rem; margin-left: 0.2rem; }
        .btn-delete:hover { background: #dc2626; }
        .btn-link { background: #6b7280; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle; }
        th { background-color: #f2f2f2; }
        .input-sm { width: 90%; padding: 0.3rem; border: 1px solid #ccc; border-radius: 4px; }
        .select-sm { width: 90%; padding: 0.3rem; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>

    <!-- 1. 新增使用者資料表單 -->
    <div class="card">
        <h2>新增使用者資料</h2>
        <form action="/page_c" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">姓名 (Name):</label>
                <input type="text" id="name" name="name" required placeholder="例如: tom">
            </div>
            <div class="form-group">
                <label for="age">年齡 (Age):</label>
                <input type="number" id="age" name="age" required placeholder="例如: 25">
            </div>
            <div class="form-group">
                <label for="gender">性別 (Gender):</label>
                <select id="gender" name="gender" required>
                    <option value="male">male (男)</option>
                    <option value="female">female (女)</option>
                    <option value="other">other (其他)</option>
                </select>
            </div>
            <button type="submit" class="btn">送出並新增</button>
        </form>
    </div>

    <!-- 2. 即時編輯與刪除列表區塊 -->
    <div class="card">
        <h2>資料庫列表（可直接修改或刪除）</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 25%;">姓名</th>
                    <th style="width: 18%;">年齡</th>
                    <th style="width: 20%;">性別</th>
                    <th style="width: 29%;">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <!-- 表單：用於更新該筆資料 -->
                        <form action="/page_c/update/{{ $user->id }}" method="POST" id="update-form-{{ $user->id }}">
                            @csrf
                            @method('PUT')
                            <td>{{ $user->id }}</td>
                            <td>
                                <input type="text" name="name" value="{{ $user->name }}" class="input-sm" required>
                            </td>
                            <td>
                                <input type="number" name="age" value="{{ $user->age }}" class="input-sm" required>
                            </td>
                            <td>
                                <select name="gender" class="select-sm" required>
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>male</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>female</option>
                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>other</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn-update">儲存</button>
                        </form>

                        <!-- 表單：用於刪除該筆資料 -->
                        <form action="/page_c/delete/{{ $user->id }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('確定要刪除 ID {{ $user->id }} 嗎？')">刪除</button>
                        </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn-link">← 返回 a 頁面</a>
    </div>

</body>
</html>
