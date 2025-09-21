<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-700 p-6 font-sans">
  <h1 class="text-3xl font-bold text-center text-white mb-6 tracking-wide">Students Info</h1>

  <!-- Search Form -->
  <form action="<?=site_url('users');?>" method="get" class="flex justify-end mb-6">
    <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
    <div class="flex space-x-2">
      <input 
        class="w-80 px-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-indigo-300 focus:outline-none"
        name="q" 
        type="text" 
        placeholder="Search" 
        value="<?=html_escape($q);?>" 
      />
      <button 
        type="submit" 
        class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 transition">
        Search
      </button>
    </div>
  </form>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-11/12 mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
      <thead class="bg-indigo-700 text-white text-sm uppercase tracking-wide">
        <tr>
          <th class="px-6 py-3 text-left">ID</th>
          <th class="px-6 py-3 text-left">Name</th>
          <th class="px-6 py-3 text-left">Email</th>
          <th class="px-6 py-3 text-left">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 text-gray-700">
        <?php foreach (html_escape($user) as $users): ?>
        <tr class="hover:bg-gray-50 transition">
          <td class="px-6 py-3"><?=$users['id']; ?></td>
          <td class="px-6 py-3"><?=$users['username']; ?></td>
          <td class="px-6 py-3"><?=$users['email']; ?></td>
          <td class="px-6 py-3 space-x-2">
            <a href="<?=site_url('/users/update/'.$users['id']);?>" 
              class="px-3 py-1 bg-cyan-600 text-white text-sm rounded-md shadow hover:bg-cyan-700 transition">
              Update
            </a>
            <a href="<?=site_url('/users/delete/'.$users['id']);?>" 
              class="px-3 py-1 bg-red-600 text-white text-sm rounded-md shadow hover:bg-red-700 transition">
              Delete
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex justify-center">
    <div class="bg-white px-4 py-2 rounded-md shadow text-gray-700">
      <?php echo $page; ?>
    </div>
  </div>

  <!-- Create Button -->
  <div class="text-center mt-6">
    <a href="<?=site_url('users/create'); ?>" 
      class="inline-block px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-500 text-white font-semibold rounded-md shadow hover:from-green-700 hover:to-emerald-600 transition">
      + Create New User
    </a>
  </div>
</body>
</html>
