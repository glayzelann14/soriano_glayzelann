<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 p-6 font-sans text-gray-800">

  <!-- Header -->
  <h1 class="text-3xl font-semibold text-center mb-8">Students Info</h1>

  <!-- Search Form -->
  <form action="<?= site_url('users'); ?>" method="get" class="flex justify-end mb-6">
    <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
    <div class="flex items-center space-x-2">
      <input 
        class="w-80 px-4 py-2 rounded-md border border-gray-300 focus:ring-1 focus:ring-gray-500 focus:outline-none"
        name="q" 
        type="text" 
        placeholder="Search by name or email..." 
        value="<?= html_escape($q); ?>" 
      />
      <button 
        type="submit" 
        class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition">
        Search
      </button>
    </div>
  </form>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full max-w-6xl mx-auto bg-white border border-gray-200 rounded-lg shadow-sm">
      <thead class="bg-gray-200 text-gray-700 text-sm uppercase">
        <tr>
          <th class="px-6 py-3 text-left">ID</th>
          <th class="px-6 py-3 text-left">Name</th>
          <th class="px-6 py-3 text-left">Email</th>
          <th class="px-6 py-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody class="text-sm divide-y divide-gray-100">
        <?php if (empty($user)): ?>
          <tr>
            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($user as $users): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-3"><?= html_escape($users['id']); ?></td>
              <td class="px-6 py-3"><?= html_escape($users['username']); ?></td>
              <td class="px-6 py-3"><?= html_escape($users['email']); ?></td>
              <td class="px-6 py-3 space-x-2">
                <a 
                  href="<?= site_url('/users/update/' . $users['id']); ?>" 
                  class="inline-block px-3 py-1 bg-gray-700 text-white text-xs rounded hover:bg-gray-600 transition">
                  Update
                </a>
                <a 
                  href="<?= site_url('/users/delete/' . $users['id']); ?>" 
                  onclick="return confirm('Are you sure you want to delete this user?');"
                  class="inline-block px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-500 transition">
                  Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
<div class="mt-6 flex justify-center">
  <div class="flex items-center flex-wrap gap-2 bg-white px-4 py-3 rounded-md shadow text-sm text-gray-700">
    <?php 
      if (!empty($page)) {
        // tanggalin ang <br> at gawing space lang
        $page = str_replace('<br>', ' ', $page);

        echo str_replace(
          ['<a', '</a>', '<strong>', '</strong>'],
          [
            '<a class="inline-block px-3 py-1 border border-gray-300 rounded hover:bg-gray-100 transition"',
            '</a>',
            '<span class="inline-block px-3 py-1 font-semibold text-white bg-gray-800 rounded">',
            '</span>'
          ],
          $page
        );
      }
    ?>
  </div>
</div>



  <!-- Create Button -->
  <div class="text-center mt-8">
    <a href="<?= site_url('users/create'); ?>" 
      class="inline-block px-6 py-3 bg-gray-800 text-white rounded-md text-sm hover:bg-gray-700 transition">
      + Create New User
    </a>
  </div>

</body>
</html>
