<!DOCTYPE html>
<html>
<head>
  <title>Search Product</title>
  <style>
    body {
      display: flex;
      justify-content: top;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }

    form {
      border: 1px solid #ccc;
      padding: 20px 30px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <form method="POST" action="{{ route('product.search') }}">
    @csrf
    

    <h2>Search Product</h2>

    <label for="name"><strong>Product Name:</strong></label><br>
    <input type="text" id="name" name="name" placeholder="Enter product name" required><br><br>

    

    <input type="submit" value="Search product">
  </form>

</body>
</html>
