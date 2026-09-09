<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>

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
    width:600px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 25px rgba(0,0,0,.1);
}

h2{
    color:#1746A2;
    margin-bottom:20px;
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:8px;
    color:#1E3A8A;
    font-weight:600;
}

input, textarea{
    width:100%;
    padding:12px;
    border:1px solid #CBD5E1;
    border-radius:8px;
    font-size:15px;
}

textarea{
    resize:vertical;
}

.buttons{
    display:flex;
    justify-content:space-between;
    margin-top:25px;
}

.update{
    background:#16A34A;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

.back{
    background:#64748B;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    text-decoration:none;
}
</style>

</head>
<body>

<div class="container">

<h2>Edit Product</h2>

<form method="POST" action="/products/update/<?= $product['id']; ?>">

    <label>Product Name</label>
    <input
        type="text"
        name="product_name"
        value="<?= $product['product_name']; ?>"
        required
    >

    <label>Description</label>
    <textarea name="description" rows="4" required><?= $product['description']; ?></textarea>

    <label>Price</label>
    <input
        type="number"
        name="price"
        step="0.01"
        value="<?= $product['price']; ?>"
        required
    >

    <label>Quantity</label>
    <input
        type="number"
        name="quantity"
        value="<?= $product['quantity']; ?>"
        required
    >

    <div class="buttons">
        <a href="/products" class="back">Back</a>
        <button class="update" type="submit">Update Product</button>
    </div>

</form>

</div>

</body>
</html>