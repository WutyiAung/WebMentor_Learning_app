<x-header></x-header>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center px-3">Popular Courses</h6>
            <h1 class="mb-5" style="color: #fb873f;">Explore new and trending free online courses</h1>
        </div>

        <div class="container my-5">
            <form action="{{ route('public.courses') }}" method="GET" class="d-flex">
                <div class="input-group" style="max-width: 600px; margin: 0 auto;">
                    <!-- Dropdown for categories -->
                    <button class="btn btn-outline-primary text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ request('category_name') ?? 'Categories' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" href="#" onclick="selectCategory('{{ $category->id }}', '{{ $category->name }}', event)">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="category_id" id="category_id" value="{{ request('category_id') }}">
                    <input type="hidden" name="category_name" id="category_name" value="{{ request('category_name') }}">
                    
                    <!-- Search input -->
                    <input type="text" class="form-control" placeholder="Search..." name="query" value="{{ request('query') }}">
                    <button class="btn btn-primary" type="submit">Search courses</button>
                </div>
            </form>
        </div>

        <div class="row g-4 py-2">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <!-- Make the card clickable by wrapping it in an anchor tag -->
                <a href="{{ route('courses.showDetails', $course->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow">
                        <div class="position-relative overflow-hidden text-light" style="height: 200px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" style="object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3 p-2 bg-warning text-dark fw-bold text-uppercase rounded" style="font-size: 12px;">
                                FREE
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2">
                                {{ $course->title }}
                            </h5>
                            <p class="mb-2"><strong>Category:</strong> {{ $course->category->name }}</p>
                            <p class="mb-2"><strong>Level:</strong> {{ $course->level }}</p> <!-- Added level here -->
                            <p class="card-text description">
                                {{ $course->description }}
                            </p>
                            <div class="mt-3">
                                <p class="mb-1"><strong>Source:</strong> {{ $course->source }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <!-- Optionally include the button inside the card, but it will not be necessary if the whole card is clickable -->
                            <a href="{{ route('courses.showDetails', $course->id) }}" class="btn btn-sm btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        

        <!-- Pagination -->
        <div class="pagination">
            {{ $courses->links() }}
        </div>
    </div>
</div>
<!-- Courses End -->

<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center px-3">Categories</h6>
            <h1 class="mb-5" style="color: #fb873f;">Popular Topics to Explore</h1>
        </div>
        <div class="row g-2 m-2">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">
                        <img src="{{ asset('img/cat' . $category->id . '.png') }}" class="img-fluid" alt="categories">
                        <h5 class="my-2">
                            <a href="#" class="text-center">{{ $category->name }}</a>
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Pagination -->
    <div class="pagination">
        {{ $courses->links() }}
    </div>
</div>
<!-- Categories End -->

<script>
    function selectCategory(categoryId, categoryName, event) {
        event.preventDefault(); // Prevent the default anchor click behavior

        // Set the category_id input value
        document.getElementById('category_id').value = categoryId;

        // Set the dropdown button text
        document.getElementById('dropdownMenuButton').innerText = categoryName;

        // Set the hidden input for category name
        document.getElementById('category_name').value = categoryName;

        // Submit the form
        document.querySelector('form').submit();
    }
</script>

<x-footer></x-footer>
