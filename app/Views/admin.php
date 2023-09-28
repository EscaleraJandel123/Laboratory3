<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Hello Admin</h1>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($items)): foreach($items as $item): ?>
            <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['image']; ?></td>
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

