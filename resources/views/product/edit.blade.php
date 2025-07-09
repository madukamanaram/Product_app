<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <title>Product App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            margin: 0;
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


    <body class="h-full">



<div>
  
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="{{ asset('images/product-logo.png') }}" alt="Product App Logo" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- nev bar nevigations -->
              
                      <a href="{{route('product.create') }}" class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                      <!-- Left Arrow Icon --> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>Go back to Add Product</a>
                      
                      
                      <a href="{{ route('product.store') }}" class="flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                      <!-- Left Arrow Icon --><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>Go back to Product List</a>
            

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
  

<div class="flex justify-center items-center min-h-screen px-4 bg-gray-100">

  <form id="editProductForm" method="POST" action="{{ route('product.update', ['product' => $product->id]) }}"class="w-full max-w-[650px] bg-white border border-gray-300 rounded-lg shadow-md p-8">


    @csrf
    @method('PUT')

    
    

   <h2 class="text-2xl font-bold tracking-tight text-gray-900">Edit the Product</h2>

<label for="name"><strong>Product Name:</strong></label><br>
<input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Enter product name" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" required><br><br>

<label for="price"><strong>Price (USD):</strong></label><br>
<input type="number" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price (e.g. 19.99)" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" required step="0.01" min="0" max="9999.99"><br><br>

<label for="description"><strong>Description:</strong></label><br>
<textarea id="description" name="description" placeholder="Enter product description" class="w-full px-3 py-2 border border-gray-300 rounded mt-2">{{ $product->detail->description ?? '' }}</textarea><br><br>

<label for="quantity"><strong>Quantity:</strong></label><br>
<input type="number" id="quantity" name="quantity" value="{{ $product->detail->quantity ?? 0 }}" placeholder="Enter quantity" class="w-full px-3 py-2 border border-gray-300 rounded mt-2" required step="0.01" min="0"><br><br>

<input type="submit" value="Edit the product" class="bg-blue-600 text-sm font-medium text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer transition duration-200 text-center">

  </form>
</div>
  <script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#editProductForm').on('submit', function(e) {
      e.preventDefault(); // stop default form submit

      $.ajax({
          url: $(this).attr('action'),
          method: 'POST',  // Laravel expects POST with _method=PUT
          data: $(this).serialize(),
          success: function(response) {
              alert('Product updated successfully!');
              console.log(response);
              // Optionally reset or do something here
          },
          error: function(xhr) {
              alert('Failed to update product');
              console.log(xhr.responseText);
          }
      });
  });
</script>
</div>
</body>

</html>
