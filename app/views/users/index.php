<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-5xl bg-white shadow-2xl rounded-2xl p-8">
    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6 text-center tracking-wide">
      👥 User Management
    </h1>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg shadow">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Username</th>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Email</th>
            <th class="px-6 py-3 text-center text-sm font-semibold uppercase">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach(html_escape($users) as $user): ?>
            <tr class="hover:bg-gray-50 transition duration-200">
              <td class="px-6 py-4 text-gray-700"><?= ($user['id']);?></td>
              <td class="px-6 py-4 font-medium text-gray-800"><?= ($user['username']);?></td>
              <td class="px-6 py-4 text-gray-600"><?= ($user['email']);?></td>
              <td class="px-6 py-4 flex items-center justify-center gap-3">
                <a href="<?=site_url('users/update/'.$user['id']);?>" 
                   class="px-3 py-1 rounded-lg bg-blue-500 text-white text-sm hover:bg-blue-600 transition">
                   ✏️ Update
                </a>
                <a href="<?=site_url('users/delete/'.$user['id']);?>" 
                   class="px-3 py-1 rounded-lg bg-red-500 text-white text-sm hover:bg-red-600 transition"
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   🗑️ Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Create Button -->
    <div class="mt-6 text-center">
      <a href="<?=site_url('users/create');?>"
         class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition">
         ➕ Create New User
      </a>
    </div>
  </div>

</body>
</html>
