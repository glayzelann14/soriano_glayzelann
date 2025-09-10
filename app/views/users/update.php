<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Update Record</h1>

    <form action="<?=site_url('users/update/'.segment(4));?>" method="POST" class="space-y-4">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" 
        id="username" 
        name="username"
         value="<?= html_escape($user ['username']);?>"
        required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" 
        id="email" 
        name="email" 
         value="<?= html_escape($user ['email']);?>"

        required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
        Update
      </button>
    </form>

    <!-- Already have account -->
    <p class="text-center text-sm text-gray-600 mt-4">
      Already have an account? 
      <a href="login.php" class="text-blue-600 hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
