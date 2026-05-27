<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; margin: 0; }
        .wrap { max-width: 420px; margin: 60px auto; background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 24px; }
        h1 { margin: 0 0 16px; font-size: 22px; }
        .msg { margin-bottom: 12px; padding: 10px; border-radius: 6px; font-size: 14px; }
        .err { background: #fee2e2; color: #991b1b; }
        .ok { background: #dcfce7; color: #166534; }
        label { display: block; margin-top: 10px; margin-bottom: 6px; font-size: 14px; }
        input { width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; }
        button { margin-top: 14px; width: 100%; padding: 10px; border: 0; border-radius: 6px; background: #111827; color: #fff; cursor: pointer; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Login</h1>

        <?php if (session()->has('error')): ?>
            <div class="msg err"><?= esc(session('error')) ?></div>
        <?php endif; ?>
        <?php if (session()->has('success')): ?>
            <div class="msg ok"><?= esc(session('success')) ?></div>
        <?php endif; ?>

        <form action="/login" method="post">
            <?= csrf_field() ?>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="<?= esc(old('email')) ?>">

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>

