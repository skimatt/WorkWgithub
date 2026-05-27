<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Halo, <?= esc((string) session('name')) ?> (<?= esc((string) session('role')) ?>)</p>
    <p><a href="/logout">Logout</a></p>
</body>
</html>

