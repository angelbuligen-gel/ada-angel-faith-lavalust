<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            font-family: Arial, sans-serif;

            background: #0b1f3a;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px;
        }

        /* ---------------------------------------------------------
           MAIN CONTAINER
        --------------------------------------------------------- */

        .container {
            width: 100%;
            max-width: 600px;

            background: #ffffff;

            border-radius: 12px;

            padding: 35px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }


        /* ---------------------------------------------------------
           HEADER
        --------------------------------------------------------- */

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;

            color: #0b1f3a;

            font-size: 28px;
        }

        .header p {
            margin-top: 8px;
            margin-bottom: 0;

            color: #777777;

            font-size: 14px;
        }


        /* ---------------------------------------------------------
           FORM
        --------------------------------------------------------- */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            color: #0b1f3a;

            font-size: 14px;

            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d0d5db;

            border-radius: 7px;

            font-family: Arial, sans-serif;

            font-size: 14px;

            color: #222222;

            background: #ffffff;

            outline: none;

            transition: border 0.2s, box-shadow 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #0b1f3a;

            box-shadow: 0 0 0 3px rgba(11, 31, 58, 0.12);
        }

        textarea {
            min-height: 120px;

            resize: vertical;
        }


        /* ---------------------------------------------------------
           BUTTONS
        --------------------------------------------------------- */

        .actions {
            display: flex;

            gap: 10px;

            margin-top: 30px;
        }

        button,
        .back {
            border: none;

            border-radius: 7px;

            padding: 12px 20px;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            text-decoration: none;

            text-align: center;
        }

        .save-btn {
            flex: 1;

            background: #f4c542;

            color: #0b1f3a;
        }

        .save-btn:hover {
            background: #e3b52f;
        }

        .back {
            background: #0b1f3a;

            color: #ffffff;
        }

        .back:hover {
            background: #163968;
        }


        /* ---------------------------------------------------------
           RESPONSIVE
        --------------------------------------------------------- */

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .container {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .actions {
                flex-direction: column;
            }

            .save-btn,
            .back {
                width: 100%;
            }

        }

    </style>

</head>


<body>

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <h1>Add Product</h1>

        <p>
            Enter the product information below.
        </p>

    </div>


    <!-- FORM -->

    <form
        method="POST"
        action="/LavaLust_/ada-angel-faith-lavalust/products2/store"
    >

        <!-- PRODUCT NAME -->

        <div class="form-group">

            <label for="product_name">
                Product Name
            </label>

            <input
                type="text"
                id="product_name"
                name="product_name"
                placeholder="Enter product name"
                required
            >

        </div>


        <!-- DESCRIPTION -->

        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                placeholder="Enter product description"
            ></textarea>

        </div>


        <!-- PRICE -->

        <div class="form-group">

            <label for="price">
                Price
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0"
                placeholder="0.00"
                required
            >

        </div>


        <!-- QUANTITY -->

        <div class="form-group">

            <label for="quantity">
                Quantity
            </label>

            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                placeholder="Enter quantity"
                required
            >

        </div>


        <!-- ACTION BUTTONS -->

        <div class="actions">

            <a
                class="back"
                href="/LavaLust_/ada-angel-faith-lavalust/products2"
            >
                ← Back
            </a>

            <button
                type="submit"
                class="save-btn"
            >
                Save Product
            </button>

        </div>

    </form>

</div>

</body>

</html>