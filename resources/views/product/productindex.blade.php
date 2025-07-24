<html class="h-full bg-gray-100">
    <head>
      @livewireStyles
  <title>Product App</title>
  <script src = "https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<livewire:product-search />


  
    

    

<!-- add product button -->




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
        <td class="px-6 py-6"><span class="product-name" data-id="{{ $iteam->id }}">{{ $iteam->name }}</span></td>
        <td class="px-6 py-6">{{ $iteam->price }}</td>
        <td >{{ $iteam->detail->description ?? 'No Description' }}</td>
        <td>{{ $iteam->detail->quantity ?? '0' }}</td>
<!-- edit-->  <td ><button class="editbutton bg-blue-500 text-sm font-medium text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer transition duration-200" data-id="{{ $iteam->id }}" data-name="{{ $iteam->name }}">Edit</button></td> <!-- edit button -->
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

  <script>
  // When edit button is clicked
  $(document).on("click", ".editbutton", function () {
    let row = $(this).closest("tr");
    let nameCell = row.find(".product-name");
    let id = nameCell.data("id");
    let currentName = nameCell.text().trim();

    // Prevent duplicate input boxes
    if (nameCell.find("input").length > 0) return;

    // Replace text with input
    nameCell.html(`<input type="text" class="name-input border border-gray-400 px-2 py-1 w-full rounded" value="${currentName}" />`);
    nameCell.find("input").focus();
  });

  // Save on blur
  $(document).on("blur", ".name-input", function () {
    let input = $(this);
    let newName = input.val().trim();
    let nameCell = input.closest(".product-name");
    let id = nameCell.data("id");

    if (newName === "") {
      nameCell.text("Unnamed");
      return;
    }

    // Send only name via AJAX 
    $.ajax({
      url: "/products/" + id,
      method: "POST",
      data: {
        _method: "PUT",
        _token: "{{ csrf_token() }}",
        name: newName
      },
      success: function () {
        nameCell.html(newName);
      },
      error: function (err) {
        alert("Update failed: " + err.responseText);
        nameCell.html(input.val());
      }
    });
  });

  // Also save on Enter key
  $(document).on("keydown", ".name-input", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      $(this).blur(); // Trigger blur event to save
    }
  });
</script>


@livewireScripts
    </body>
</html>
