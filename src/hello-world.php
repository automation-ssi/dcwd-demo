<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
  <div class="space-y-3 p-5">
    <h1 class="text-lg"><?php echo getenv('DB_HOST'); ?></h1>
  </div>
</body>
</html>