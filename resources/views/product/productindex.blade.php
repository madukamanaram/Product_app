<html class="h-full bg-gray-100">
    <head>
  <title>Product App</title>
  <script src = "https://cdn.tailwindcss.com"></script>
  <style>
  th, td {
    padding: 1rem 1.5rem; /* Equivalent to px-6 py-4 */
    text-align: center;
    border-bottom: 1px solid #e5e7eb; /* Tailwind's border-gray-200 */
    color: #374151; /* Optional: Tailwind's text-gray-700 */
    font-weight: 600;
  }

  
    

    .custom-form {
  border: 1px solid #ccc;
  padding: 20px 30px;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
</style>
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
              <a href="{{route('product.store') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white  "aria-current="page">Product List</a>

     
    
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          
      </div>
    </div>

    
  </nav>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Product List</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      


<div class="flex items-center justify-center bg-gray-100  ">  
<!-- nev bar end -->

<!-- Your content -->

  <form method="GET" action="{{ route('product.search') }}" 
        class="flex items-center gap-2 p-2  rounded-lg  w-full max-w-2xl  "> <!-- serchbar gap -->
        
    @csrf

    <input type="text" id="name" name="name" placeholder="Search product..." 
           class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:outline-none " required>

    <button type="submit" 
            class="text-sm font-medium text-white bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
      Search
    </button>
    

<!-- add product button -->

<a href="{{route('product.create') }}" 
   class="text-sm font-medium text-white bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
  Add Product
</a>


  </form>
</div>


    



  <div class="max-w-6xl mx-auto px-5 py-2">
    

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full border-separate border-spacing-y-0  text-sm text-gray-800">
        
        <thead class="bg-gray-300">
          <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price (USD)</th>
        <th>Description</th> 
        <th>Quantity</th>   
        <th>Edit</th>
        <th >Delete </th>
    </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-sm">
          @foreach($product as $iteam)
    <tr class="border-b text-center">
        <td class="px-6 py-6">{{ $iteam->id }}</td>
        <td class="px-6 py-6">{{ $iteam->name }}</td>
        <td class="px-6 py-6">{{ $iteam->price }}</td>
        <td >{{ $iteam->detail->description ?? 'No Description' }}</td>
        <td>{{ $iteam->detail->quantity ?? '0' }}</td>
        <td ><a href="{{route('product.edit', ['product'=> $iteam])}}" class="bg-blue-600 text-sm font-medium text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer transition duration-200" >Edit</a> </td>
        <div class="inline-flex gap-2">
        <td class="align-middle text-center">
  <form method="POST" action="{{ route('product.delete', ['product' => $iteam]) }}" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="bg-red-500 text-sm font-medium text-white px-4 py-2 rounded hover:bg-red-700 cursor-pointer transition duration-200">
      Delete
    </button>
  </form>
</td>


    </tr>
    @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

</table>

</div>

</div>
</div>


</div>
  </main>    
    </body>
</html>
