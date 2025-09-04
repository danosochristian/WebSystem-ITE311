<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <h2 class="text-center mb-4 fw-bold text-primary">Sign In</h2>

        <?php if (session()->getFlashdata('register_success')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= esc(session()->getFlashdata('register_success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('login_error')): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= esc(session()->getFlashdata('login_error')) ?>
            </div>
        <?php endif; ?>

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <form action="<?= base_url('login') ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" 
                               class="form-control" 
                               id="email" name="email" 
                               placeholder="Enter your email"
                               value="<?= esc(old('email')) ?>" 
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" 
                               class="form-control" 
                               id="password" name="password" 
                               placeholder="Enter your password"
                               required>
                    </div>
                    <button type="submit" 
                            class="btn btn-primary w-100 rounded-pill fw-semibold py-2">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <small class="text-muted">
                Don't have an account? 
                <a href="<?= base_url('register') ?>" class="text-decoration-none text-primary fw-semibold">
                    Register here
                </a>
            </small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
