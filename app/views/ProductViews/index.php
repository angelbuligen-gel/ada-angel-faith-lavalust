<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#eef4ff;
    padding:40px;
}

.container{
    max-width:1100px;
    margin:auto;
    background:white;
    border-radius:15px;
    padding:30px;
    box-shadow:0 8px 25px rgba(0,0,0,.1);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h2{
    color:#1746A2;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    color:white;
    font-weight:bold;
}

.add{
    background:#2563EB;
}

.logout{
    background:#DC2626;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#1746A2;
    color:white;
    padding:15px;
}

td{
    padding:14px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#F4F8FF;
}

.edit{
    background:#16A34A;
    padding:8px 12px;
    border-radius:6px;
    color:white;
    text-decoration:none;
}

.delete{
    background:#DC2626;
    padding:8px 12px;
    border-radius:6px;
    color:white;
    text-decoration:none;
}
</style>

</head>
<body>

<div class="container">

    <div class="header">
        <h2>Product Management</h2>

        <div>
            <a href="/products/create" class="btn add">+ Add Product</a>
            <a href="/logout" class="btn logout">Logout</a>
        </div>
    </div>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach($products as $product): ?>

            <tr>

                <td><?= $product['id']; ?></td>
                <td><?= $product['product_name']; ?></td>
                <td><?= $product['description']; ?></td>
                <td>₱<?= number_format($product['price'],2); ?></td>
                <td><?= $product['quantity']; ?></td>
                <td><?= $product['created_at']; ?></td>

                <td>
                    <a class="edit" href="/products/edit/<?= $product['id']; ?>">Edit</a>

                    <a class="delete"
                       onclick="return confirm('Delete this product?')"
                       href="/products/delete/<?= $product['id']; ?>">
                       Delete
                    </a>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

</body>
</html>