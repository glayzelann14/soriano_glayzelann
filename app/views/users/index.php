
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <title>UsersData</title>
  <style>
    /* Reset some defaults */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
      color: #333;
    }

    h1 {
      margin-top: 10px;
      text-align: center;
      padding: 20px;
      margin: 0;
      background: #188b5cff;
      color: white;
      font-size: 28px;
    }

    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
    }

    th {
      background-color: #188b5cff;
      color: white;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      color: white;
      background-color: #1b5244de;
      transition: 0.3s;
    }

    td {
      font-size: 14px;
    }

.search-container {
  margin-top: 20px;
  display: flex;
  justify-content: flex-end; /* align to right */
  margin-bottom: 16px;
}

.search-bar {
  display: flex;
  gap: 10px; /* space between input and button */
}

/* Search Input */
.form-control {
  flex: 1;
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
  transition: border 0.3s, box-shadow 0.3s;
  min-width: 200px; /* keeps it from shrinking too small */
}

.form-control:focus {
  border-color: #0d9488; /* teal-600 */
  box-shadow: 0 0 4px rgba(13, 148, 136, 0.5);
  outline: none;
}

/* Search Button */
.btn-primary {
  background-color: #0d9488; 
  border: none;
  padding: 8px 16px;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s;
  white-space: nowrap;
}

.btn-primary:hover {
  background-color: #0f766e; /* teal-700 */
}



/* Pagination container */
.pagination {
    list-style: none; 
    display: flex;
    justify-content: center; /* center align */
    margin-top: 20px;
}

/* Pagination links */
.pagination li a {
    color: #0d9488; /* teal-600 */
    border: 1px solid #0d9488;
    padding: 6px 12px;
    margin: 0 3px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
}

/* Hover effect */
.pagination li a:hover {
    background-color: #0d9488;
    color: white;
}

/* Active page */
.pagination .active a {
    background-color: #0d9488;
    color: white;
    border-color: #0d9488;
}

/* Disabled state */
.pagination .disabled a {
    color: #aaa;
    border-color: #ddd;
    cursor: not-allowed;
}



  </style>
</head>
<body>
  <h1>Welcome to UsersData View</h1>
<div class="search-container">
<form action="<?=site_url('users');?>" method="get" class="search-bar col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
</div>





  <table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php foreach (html_escape($users) as $user): ?>
    <tr>
      <td><?= $user['id']; ?></td>
      <td><?= $user['username']; ?></td>
      <td><?= $user['email']; ?></td>
      <td><a href="<?=site_url('users/update/'.$user['id']);?>" class="link-update">Update </a> | 
      <a href="<?=site_url('users/delete/'.$user['id']);?>" class="link-delete">Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  
<?php
	echo $page;?>

  <div>
    <a  href="<?=site_url('users/create');?>" class="btn-create">Create Record</a>
  </div>
  
</body>
</html>
