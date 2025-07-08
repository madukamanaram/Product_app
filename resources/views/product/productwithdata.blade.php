<html class="h-full bg-gray-100">
    <head>
  <title>Product App</title>
  <script src = "https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-full">


<div>
<!-- nev bar  -->
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="{{ asset('images/product-logo.png') }}" alt="Product App Logo"  />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <div class="flex items-center gap-4">
  <a href="{{ route('product.store') }}" 
     class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
    <!-- Left Arrow Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" 
         fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
         stroke="currentColor" class="w-4 h-4">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
    </svg>
    Go back to Product List
  </a>

  <a href="{{ route('product.create') }}" 
     class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-700">
    Add Product
  </a>
</div>

              
            </div>
          </div>
        </div>
        
      </div>
    </div>

    
  </nav>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Products</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
  <style>
   body {
  margin: 0;
  

/* nev bar end */
}

form {
  border: 1px solid #ccc;
  padding: 20px 30px;
  margin: 20px 0;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(165, 91, 91, 0.1);
  
}

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>



<div class="flex justify-center items-center min-h-screen px-4 bg-gray-100">

  
  <form method="POST" action="{{ route('product.store') }}"
        class="w-full max-w-[650px] bg-white border border-gray-300 rounded-lg shadow-md p-8">
    @csrf
    

    <h2 class="text-2xl font-bold tracking-tight text-gray-900" >Add Product</h2>

    <label for="name"><strong>Product Name:</strong></label><br>
    <input type="text" id="name" name="name" placeholder="Enter product name" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" required><br><br>

    <label for="price"><strong>Price (USD):</strong></label><br>
    <input type="number" id="price" name="price" placeholder="Enter price (e.g. 19.99)" class="w-full px-3 py-2 border border-gray-300 rounded mt-2"required step="0.01" min="0" max="9999.99"><br><br>

    
    <label for="description"><strong>Description:</strong></label><br>
    <textarea id="description" name="description" placeholder="Enter product description" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" ></textarea><br><br>

    
    <label for="quantity"><strong>Quantity:</strong></label><br>
    <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" required step="0.01" min="0"><br><br>


    <input type="submit" value="Add the product" class="bg-blue-600 text-sm font-medium text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer transition duration-200 text-center">
  </form>
</div>
</body>
</html>
