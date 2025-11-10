<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Create Projects</title>


</head>

<body>
    <div class="text-center font-bold align-item-center justify-content-center mt-10 bg-primary py-4">
        <h2>Create Projects</h2>
    </div>

    <div class="container">

        <div class="d-flex justify-content-end p-0 mt-3">
            <a href="{{route('projects.index')}}" class="btn btn-dark">Home</a>
        </div>

        <div class="container mt-5 mb-10">
            <h2 class="mb-4 text-center">Add Project</h2>

            <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        id="title" name="title" placeholder="Enter project title">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text"
                        class="form-control @error('companyName') is-invalid @enderror"
                        value="{{ old('companyName') }}"
                        id="companyName" name="companyName" placeholder="Enter company name">
                    @error('companyName')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="text"
                        class="form-control @error('size') is-invalid @enderror"
                        value="{{ old('size') }}"
                        id="size" name="size" placeholder="Enter size (e.g., 17.5 Katha)">
                    @error('size')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="structure" class="form-label">Structure</label>
                    <input type="text"
                        class="form-control @error('structure') is-invalid @enderror"
                        value="{{ old('structure') }}"
                        id="structure" name="structure" placeholder="Enter structure (e.g., B+G+13 storey)">
                    @error('structure')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="constructionArea" class="form-label">Construction Area</label>
                    <input type="text"
                        class="form-control @error('constructionArea') is-invalid @enderror"
                        value="{{ old('constructionArea') }}"
                        id="constructionArea" name="constructionArea" placeholder="Enter area (e.g., 0.95 Lac Sqft)">
                    @error('constructionArea')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text"
                        class="form-control @error('location') is-invalid @enderror"
                        value="{{ old('location') }}"
                        id="location" name="location" placeholder="Enter location (e.g., Bashundhara, Dhaka)">
                    @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Project Image</label>
                    <input type="file"
                        class="form-control @error('image') is-invalid @enderror"
                        id="image" name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>