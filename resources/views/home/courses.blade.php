<x-header></x-header>


<!-- Custom CSS for hover effect -->
<style>
  .dropdown-toggle-item:hover {
        color:#4543cd !important;
        font-weight: bold !important;
        background-color: #fff !important; /* Optional: change background color on hover */
    }
</style>

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
            <form id="categoryForm" action="{{ route('public.courses') }}" method="GET" class="d-flex">
                <div class="input-group" style="max-width: 800px; margin: 0 auto;">
                    <!-- Dropdown for categories -->
                    <button class="btn btn-primary text-white dropdown-toggle dropdown-toggle-item" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ request('category_name') ?? 'Categories' }}
                    </button>
                    <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item text-dark" href="#" onclick="selectCategory('', 'All', event)">
                                All
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item text-dark" href="#" onclick="selectCategory('{{ $category->id }}', '{{ $category->name }}', event)">
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

<x-footer></x-footer>

<script>
    function selectCategory(id, name, event) {
        event.preventDefault();
        document.getElementById('category_id').value = id;
        document.getElementById('category_name').value = name;
        document.getElementById('categoryForm').submit();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
