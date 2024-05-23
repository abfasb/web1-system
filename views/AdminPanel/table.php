<?php
include '../../config/connection.php';

// Fetch all users (without pagination limit)
$query = "SELECT user_id, username, email, role, created_at FROM Users ORDER BY role";
$stmt = $connection->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .container {
            max-width: 1200px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-5 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Users</h2>
        <div class="overflow-x-auto">
            <table id="usersTable" class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-300 text-left text-gray-600">ID</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left text-gray-600">Username</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left text-gray-600">Email</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left text-gray-600">Role</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left text-gray-600">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo htmlspecialchars($user['user_id']); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo htmlspecialchars($user['username']); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo htmlspecialchars($user['email']); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo htmlspecialchars($user['role']); ?></td>
                        <td class="px-4 py-2 border-b border-gray-300"><?php echo htmlspecialchars($user['created_at']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": false,
                "pageLength": 10,
                "columnDefs": [
                    { "orderable": false, "targets": [0, 1, 2, 3, 4] }
                ]
            });
        });
    </script>
</body>
</html>
