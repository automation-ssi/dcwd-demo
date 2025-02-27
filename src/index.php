<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
  <?php require_once("db_connect.php"); ?>

  <?php 
    // Fetch data in descending order (lastest entry first)
    $stmt = $db_handle->query("SELECT * FROM messages ORDER BY id DESC");
  ?>

  <div class="space-y-3 p-5">
    <h1 class="text-lg"><?php echo "Messages"; ?></h1>

    <form action="actions/create.php" method="post" class="flex gap-3">
      <input type="text" name="message" id="message" placeholder="Message" class="border border-gray-500 rounded px-3 py-1">
      <button name="submit" class="rounded bg-green-700 cursor-pointer px-3 py-1">
        <span class="text-white">Create</span>
      </button>
    </form>

    <div class="overflow-x-auto">
      <table class="min-w-full text-xs">
        <thead class="rounded-t-lg dark:bg-gray-300">
          <tr class="text-right">
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Message</th>
            <th class="p-3 text-left" width="100">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr class="text-right border-b border-opacity-20 dark:border-gray-300 dark:bg-gray-100">
            <td class="px-3 py-2 text-left"><?php echo $row['id']; ?></td>
            <td class="px-3 py-2 text-left"><?php echo $row['message']; ?></td>
            <td class="px-3 py-2 text-left">
              <form action="actions/delete.php" method="post">
                <input type="text" name="id" id="id" class="hidden" value="<?php echo $row['id'] ?>">
                <button name="delete" class="rounded bg-red-700 cursor-pointer px-3 py-1">
                  <span class="text-white">Delete</span>
                </button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>