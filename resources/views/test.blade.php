<x-header/>
    <div class="container mt-5">
        <form action="" method="GET" class="d-flex">
            <div class="input-group">
                <!-- Dropdown for categories -->
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categories as $category)
                        <li><a class="dropdown-item" href="#" onclick="selectCategory('{{ $category->id }}', '{{ $category->name }}')">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <input type="hidden" name="category_id" id="category_id">
                
                <!-- Search input -->
                <input type="text" class="form-control" placeholder="Search..." name="query">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>




<x-footer/>