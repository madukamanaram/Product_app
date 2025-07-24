<div>
    @if (session()->has('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div>
            <label>Name</label>
            <input type="text" wire:model="name">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Price</label>
            <input type="number" wire:model="price" step="0.01">
            @error('price') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea wire:model="description"></textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Quantity</label>
            <input type="number" wire:model="quantity">
            @error('quantity') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Update Product</button>
    </form>
</div>
