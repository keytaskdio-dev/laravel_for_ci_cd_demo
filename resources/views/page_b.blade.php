<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>b 頁面 - 使用者列表 ({{ $version }})</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f9fafb; }
        h1 { text-align: center; color: #111827; }
        .version_badge { text-align: center; font-size: 0.9rem; color: #6b7280; margin-bottom: 1.5rem; }

        /* b1 樣式：列表靠左，顯示 名字、年齡、創建時間 */
        .b1_table { margin: 0 auto 0 0; border-collapse: collapse; width: 60%; background: white; border: 2px solid #3b82f6; }
        .b1_table th, .b1_table td { border: 1px solid #e5e7eb; padding: 12px; text-align: center; }
        .b1_table th { background: #eff6ff; color: #1e40af; }

        /* b2 樣式：列表靠右，顯示 名字、性別、創建時間 */
        .b2_table { margin: 0 0 0 auto; border-collapse: collapse; width: 60%; background: #fffbebfb; border: 2px solid #f59e0b; }
        .b2_table th, .b2_table td { border: 1px solid #fef3c7; padding: 12px; text-align: center; }
        .b2_table th { background: #fef3c7; color: #92400e; }
    </style>
</head>
<body>

    <h1>使用者列表</h1>
    <div class="version_badge">目前版本：<strong>{{ $version }}</strong></div>

    @if($version === 'b1')
        <!-- b1 視圖：靠左，含姓名、年齡、創建時間 -->
        <table class="b1_table">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>年齡</th>
                    <th>創建時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <!-- b2 視圖：靠右，含姓名、性別、創建時間 -->
        <table class="b2_table">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>創建時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p style="text-align: center; margin-top: 2rem;"><a href="/">← 返回 a 頁面</a></p>

</body>
</html>
