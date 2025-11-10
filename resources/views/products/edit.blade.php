<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark text-center text-white py-3">
        <h1 class="h2">Edit Products</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end p-0 mt-3">
                <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
            <div class="card p-0 mt-3">
                <div class="card-header bg-dark text-white">
                    <h4 class="h4"> Edit Products</h4>
                </div>
                <div class="card-body shadow-lg">
                    <form action="{{ route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Enter product name"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text"
                                class="form-control @error('sku') is-invalid @enderror"
                                id="sku"
                                name="sku"
                                placeholder="Enter SKU"
                                value="{{ old('sku', $product->sku) }}">
                            @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number"
                                step="0.01"
                                class="form-control @error('price') is-invalid @enderror"
                                id="price"
                                name="price"
                                placeholder="Enter price"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file"
                                class="form-control @error('image') is-invalid @enderror"
                                id="image"
                                name="image">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if(!empty($product->image))
                            <img width="150" class="rounded" src="{{asset('uploads/products/'.$product->image)}}" alt="">
                            @endif
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status">
                                <option {{ ($product->status == 'Active') ? 'selected':''}} value="active">Active</option>
                                <option {{ ($product->status == 'Inactive') ? 'selected':''}} value="inactive">Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>