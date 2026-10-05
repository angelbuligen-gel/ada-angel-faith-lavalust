<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0b1f3a;
            color: #ffffff;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        button,
        .add-btn {
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .add-btn {
            background: #f4c542;
            color: #0b1f3a;
            font-weight: bold;
        }

        .logout-btn {
            background: #d9534f;
            color: white;
        }

        .message {
            background: #ffffff;
            color: #333333;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        /* TABLE */

        .table-container {
            background: #ffffff;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #222222;
        }

        thead {
            background: #f4c542;
            color: #0b1f3a;
        }

        th {
            padding: 15px;
            text-align: left;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #dddddd;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f5f7fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
            color: #0b1f3a;
        }

        .description {
            max-width: 350px;
            color: #666666;
        }

        .price {
            font-weight: bold;
            color: #0b1f3a;
            white-space: nowrap;
        }

        .quantity {
            text-align: center;
        }

        .actions {
            white-space: nowrap;
        }

        .edit-btn,
        .delete-btn {
            border: none;
            padding: 8px 13px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-btn {
            background: #0b1f3a;
            color: white;
        }

        .delete-btn {
            background: #d9534f;
            color: white;
            margin-left: 5px;
        }

        .edit-btn:hover {
            background: #163968;
        }

        .delete-btn:hover {
            background: #c9302c;
        }

        .loading {
            padding: 30px;
            text-align: center;
            color: #555555;
        }

        .empty-row {
            text-align: center;
            padding: 30px;
            color: #666666;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {

            .container {
                width: 95%;
                margin: 25px auto;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .buttons {
                width: 100%;
            }

            .add-btn,
            .logout-btn {
                flex: 1;
                text-align: center;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>Products</h1>

        <div class="buttons">

            <a
                class="add-btn"
                href="/LavaLust_/ada-angel-faith-lavalust/products2/create">
                + Add Product
            </a>

            <button
                class="logout-btn"
                onclick="logout()">
                Logout
            </button>

        </div>

    </div>


    <div id="message" class="message"></div>


    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody id="products">

                <tr>
                    <td colspan="7" class="loading">
                        Loading products...
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>


<script>

const API_URL =
    '/LavaLust_/ada-angel-faith-lavalust/api/products';


/*
|--------------------------------------------------------------------------
| Load Products
|--------------------------------------------------------------------------
*/

async function loadProducts() {

    const token =
        localStorage.getItem('access_token');


    /*
    |--------------------------------------------------------------------------
    | No token
    |--------------------------------------------------------------------------
    */

    if (!token) {

        window.location.href =
            '/LavaLust_/ada-angel-faith-lavalust/products2/login';

        return;
    }


    try {

        const response = await fetch(API_URL, {

            method: 'GET',

            headers: {
                'Authorization': 'Bearer ' + token,
                'Content-Type': 'application/json'
            }

        });


        /*
        |--------------------------------------------------------------------------
        | Unauthorized / expired token
        |--------------------------------------------------------------------------
        */

        if (response.status === 401) {

            localStorage.removeItem('access_token');
            localStorage.removeItem('refresh_token');

            window.location.href =
                '/LavaLust_/ada-angel-faith-lavalust/products2/login';

            return;
        }


        const result = await response.json();


        /*
        |--------------------------------------------------------------------------
        | API Error
        |--------------------------------------------------------------------------
        */

        if (!response.ok || result.status !== true) {

            showMessage(
                result.message || 'Unable to load products.'
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Display Products
        |--------------------------------------------------------------------------
        */

        displayProducts(result.data);

    }

    catch (error) {

        console.error(error);

        showMessage(
            'Unable to connect to the API.'
        );

    }
}


/*
|--------------------------------------------------------------------------
| Display Products in Table
|--------------------------------------------------------------------------
*/

function displayProducts(products) {

    const tableBody =
        document.getElementById('products');


    /*
    |--------------------------------------------------------------------------
    | No Products
    |--------------------------------------------------------------------------
    */

    if (!products || products.length === 0) {

        tableBody.innerHTML = `
            <tr>
                <td colspan="7" class="empty-row">
                    No products found.
                </td>
            </tr>
        `;

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Clear Existing Rows
    |--------------------------------------------------------------------------
    */

    tableBody.innerHTML = '';


    /*
    |--------------------------------------------------------------------------
    | Create Table Rows
    |--------------------------------------------------------------------------
    */

    products.forEach(function(product) {

        const row =
            document.createElement('tr');


        row.innerHTML = `

            <td>
                ${product.id}
            </td>

            <td class="product-name">
                ${escapeHtml(product.product_name)}
            </td>

            <td class="description">
                ${escapeHtml(product.description || '')}
            </td>

            <td class="price">
                ₱${Number(product.price).toFixed(2)}
            </td>

            <td class="quantity">
                ${product.quantity}
            </td>

            <td>
                ${formatDate(product.created_at)}
            </td>

            <td class="actions">

                <button
                    class="edit-btn"
                    onclick="editProduct(${product.id})">
                    Edit
                </button>

                <button
                    class="delete-btn"
                    onclick="deleteProduct(${product.id})">
                    Delete
                </button>

            </td>

        `;


        tableBody.appendChild(row);

    });

}


/*
|--------------------------------------------------------------------------
| Edit Product
|--------------------------------------------------------------------------
*/

function editProduct(id) {

    window.location.href =
        '/LavaLust_/ada-angel-faith-lavalust/products2/edit/' + id;

}


/*
|--------------------------------------------------------------------------
| Delete Product
|--------------------------------------------------------------------------
*/

async function deleteProduct(id) {

    const token =
        localStorage.getItem('access_token');


    if (!token) {

        window.location.href =
            '/LavaLust_/ada-angel-faith-lavalust/products2/login';

        return;
    }


    if (!confirm('Are you sure you want to delete this product?')) {
        return;
    }


    try {

        const response = await fetch(
            API_URL + '/' + id,
            {
                method: 'DELETE',

                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json'
                }
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Unauthorized
        |--------------------------------------------------------------------------
        */

        if (response.status === 401) {

            localStorage.removeItem('access_token');
            localStorage.removeItem('refresh_token');

            window.location.href =
                '/LavaLust_/ada-angel-faith-lavalust/products2/login';

            return;
        }


        const result =
            await response.json();


        /*
        |--------------------------------------------------------------------------
        | API Error
        |--------------------------------------------------------------------------
        */

        if (!response.ok || result.status !== true) {

            showMessage(
                result.message || 'Unable to delete product.'
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Reload Products
        |--------------------------------------------------------------------------
        */

        loadProducts();

    }

    catch (error) {

        console.error(error);

        showMessage(
            'Unable to connect to the API.'
        );

    }

}


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

function logout() {

    localStorage.removeItem('access_token');
    localStorage.removeItem('refresh_token');

    window.location.href =
        '/LavaLust_/ada-angel-faith-lavalust/products2/login';

}


/*
|--------------------------------------------------------------------------
| Show Message
|--------------------------------------------------------------------------
*/

function showMessage(message) {

    const element =
        document.getElementById('message');

    element.textContent = message;

    element.style.display = 'block';

}


/*
|--------------------------------------------------------------------------
| Escape HTML
|--------------------------------------------------------------------------
*/

function escapeHtml(value) {

    const div =
        document.createElement('div');

    div.textContent = value;

    return div.innerHTML;

}


/*
|--------------------------------------------------------------------------
| Format Date
|--------------------------------------------------------------------------
*/

function formatDate(dateValue) {

    if (!dateValue) {
        return '';
    }

    const date =
        new Date(dateValue);

    if (isNaN(date.getTime())) {
        return dateValue;
    }

    return date.toLocaleString();

}


/*
|--------------------------------------------------------------------------
| Load products when page opens
|--------------------------------------------------------------------------
*/

loadProducts();

</script>

</body>
</html>