<div class="container">
    <div class="row  justify-content-center">
        <div class="col-5">
            <div class="card mt-5">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= URL . 'register' ?>">
                        <h5 class="card-title">Register to Donuts shop</h5>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= old('name') ?>" autocomplete>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= old('email') ?>" autocomplete>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password2" autocomplete>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Color</label>
                            <input type="color" class="form-control form-control-color" value="<?= old('color') ?>" name="color">
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>