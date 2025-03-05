<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Profili</title>
</head>
<body>
<h1>Kullanıcı Profili</h1>
<?php if (isset($user_id)): ?>
    <p>Kullanıcı ID: <?= htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>
    <p>Kullanıcı Bulunamadı.</p>
<?php endif; ?>
</body>
</html>
