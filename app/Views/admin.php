<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Hello Admin</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($items)): foreach($items as $item): ?>
            <tr>
                <td><img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width="100"></td>
                <td><?= $item['name']; ?></td>
                <td><?= $item['description']; ?></td>
                <td><?= $item['price']; ?></td>
            </tr>
            <?php endforeach; else: ?>
            <tr>
                <td colspan="4">No items found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>