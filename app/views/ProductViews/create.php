<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>

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
    text-align:center;
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

.save{
    background:#2563EB;
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

    <h2>Add Product</h2>

    <!-- IMPORTANT: Use base_url() -->
    <form method="POST" action="<?= base_url(); ?>products/store">

        <label>Product Name</label>
        <input type="text" name="product_name" placeholder="Enter product name" required>

        <label>Description</label>
        <textarea name="description" rows="4" placeholder="Enter description" required></textarea>

        <label>Price</label>
        <input type="number" name="price" step="0.01" placeholder="0.00" required>

        <label>Quantity</label>
        <input type="number" name="quantity" placeholder="0" required>

        <div class="buttons">
            <a href="<?= base_url(); ?>products" class="back">Back</a>
            <button type="submit" class="save">Save Product</button>
        </div>

    </form>

</div>

</body>
</html>