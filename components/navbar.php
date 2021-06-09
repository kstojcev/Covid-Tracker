<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i id="menuIcon" class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="countries.php">Countries data</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#synchronizeModal">Synchronize Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="measures.php">Protective Measures</a>
                </li>
                <label class="switch my-auto">
                    <input type="checkbox" />
                    <span id="style-toggle" class="slider round"></span>
                </label>
            </ul>
        </div>
    </div>
</nav>

<form action="database/manual_sync.php" method="POST">
    <div class="modal fade text-dark" id="synchronizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Synchronize Data</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="passcode" class="form-label">Passcode</label>
                    <input class="w-100 form-control" type="password" id="passcode" name="passcode" placeholder="Please enter a valid passcode" required />
                </div>
                <div class="modal-footer">
                    <button id="synchronizeModalBtn" type="submit" class="btn">Synchronize!</button>
                </div>
            </div>
        </div>
    </div>
</form>