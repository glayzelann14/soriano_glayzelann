<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f2f5;
      font-family: "Segoe UI", Tahoma, sans-serif;
      padding: 30px;
    }
    h1 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 700;
      color: #333;
    }
    .search-bar {
      max-width: 500px;
      margin: 0 auto 30px;
    }
    .user-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }
    .user-card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      font-weight: 600;
      color: #007bff;
    }
    .pagination {
      justify-content: center;
      margin-top: 25px;
    }
  </style>
</head>
<body>
  <h1>Students Info</h1>

  <!-- 🔎 Search -->
  <form action="<?= site_url('users'); ?>" method="get" class="search-bar input-group">
    <input type="text" class="form-control" name="q" placeholder="Search by ID, username, or email"
           value="<?= isset($_GET['q']) ? html_escape($_GET['q']) : '' ?>">
    <button class="btn btn-primary">Search</button>
  </form>

  <!-- 👥 User Cards -->
  <div class="row g-4">
    <?php if (!empty($users)): ?>
      <?php foreach ($users as $u): ?>
        <div class="col-md-4">
          <div class="card user-card p-3">
            <h5 class="card-title"><?= $u['username']; ?></h5>
            <p class="card-text"><strong>Email:</strong> <?= $u['email']; ?></p>
            <p class="card-text text-muted">ID: <?= $u['id']; ?></p>
            <div class="d-flex gap-2">
              <a href="<?= site_url('users/update/'.$u['id']); ?>" class="btn btn-sm btn-info text-white">Update</a>
              <a href="<?= site_url('users/delete/'.$u['id']); ?>" 
                 onclick="return confirm('Delete this user?')"
                 class="btn btn-sm btn-danger">Delete</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center">No users found.</p>
    <?php endif; ?>
  </div>

  <!-- 📑 Pagination -->
  <div class="pagination">
    <?= $page; ?>
  </div>

  <!-- ➕ Add User -->
  <div class="text-center mt-4">
    <a href="<?= site_url('users/create'); ?>" class="btn btn-success">+ Create New User</a>
  </div>
</body>
</html>
