<header>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-transparent position-fixed top-0 w-100 shadow-lg" style="z-index: 1000;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-1" href="/">Library</a>
            <button class="navbar-toggler border-3 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link fs-4 fw-bold text-warning" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 fw-bold text-warning" href="#" data-bs-toggle="modal" data-bs-target="#addBookModal">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 fw-bold text-warning" href="/books/index">Show</a>
                    </li>
                </ul>

                <form class="d-flex align-items-center pe-5 gap-2 ms-5 px-1">
                    <input class="form-control input-search bg-transparent border border-warning text-light shadow-sm " type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-warning shadow-sm" type="button">Search</button>
                </form>

                <div class="d-flex align-items-center gap-3 ">
                    <button type="button" class="btn btn-outline-warning shadow-sm ">Login</button>
                    <button type="button" class="btn btn-outline-warning shadow-sm ml-5">Signup</button>
                </div>
            </div>
        </div>
    </nav>
</header>



<div class="modal fade bg-black bg-opacity-75 " id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-warning  rounded-5">
            <div class="modal-header bg-dark text-white ">
                <h5 class="modal-title w-100 text-center" id="addBookModalLabel">Add a New Book</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white p-5" style="background-color: #0f1115;">
                <form action="/books/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Title</label>
                        <input type="text" name="name" id="name" class="form-control bg-dark text-white border-secondary" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-white">Description</label>
                        <textarea name="description" id="description" class="form-control bg-dark text-white border-secondary" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label text-white">Price</label>
                        <input type="number" name="price" id="price" class="form-control bg-dark text-white border-secondary" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
