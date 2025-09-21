<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Students Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px; 
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        table {
            width: 90%;
            margin: 0 auto 25px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 14px 16px;
            text-align: left;
        }
        th {
            background: blue;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 14px;
        }
        td {
            font-size: 15px;
            color: #444;
            border-bottom: 1px solid #eee;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background-color: #f7f9fc;
            transition: background-color 0.3s ease;
        }
        .search-form {
            width: 90%;
            margin: 0 auto 30px;
            display: flex;
            justify-content: flex-end;
        }
        .btn-create {
            display: inline-block;
            padding: 12px 22px;
            background: linear-gradient(to right, #28a745, #20c997);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .btn-create:hover {
            background: linear-gradient(to right, #218838, #198754);
            transform: translateY(-2px);
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 6px;
            background: #fff;
            color: #333;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        .pagination a:hover {
            background: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Students Info</h1>

    <!-- 🔎 Search -->
    <form action="<?= site_url('users');?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search..." value="<?= html_escape($q); ?>">
        <button type="submit" class="btn btn-primary">Search</button> 
    </form>

    <!-- 👥 Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="20%">Action</th>
        </tr>
        <?php if (!empty($user)): ?>
            <?php foreach ($user as $u): ?>
            <tr>
                <td><?= $u['id']; ?></td>
                <td><?= $u['username']; ?></td>
                <td><?= $u['email']; ?></td>
                <td>
                    <a href="<?= site_url('/users/update/'.$u['id']);?>" class="btn btn-sm btn-info text-white">Update</a>
                    <a href="<?= site_url('/users/delete/'.$u['id']);?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <!-- 📑 Pagination -->
    <div class="pagination">
        <?= $page; ?>
    </div>

    <!-- ➕ Add User -->
    <div class="text-center mt-3">
        <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
    </div>
</body>
</html>
