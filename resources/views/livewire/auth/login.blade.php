<div class="container">

    <div class="row justify-content-center mt-0">
        <div class="col-md-6">
            <div class="bg-white rounded-bottom-custom shadow-sm d-block d-md-none p-3 sticky-top mb-5">
                <div class="d-flex justify-content-start">
                    <div>
                        <x-buttons.back />
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded mt-80">
                <div class="card-body p-5">
                    <h5 class="text-muted text-center mb-4">Login </h5>
                    <form wire:submit.prevent="login">

                        <div class="input-group mb-3">
                            <input type="email" wire:model.blur="email" value="{{ old('email') }}" class="form-control rounded @error('email') is-invalid @enderror" placeholder="Email Address">
                        </div>
                        @error('email')
                        <div class="alert alert-danger mt-2 rounded border-0">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" wire:model.blur="password" class="form-control rounded @error('password') is-invalid @enderror" placeholder="Password">
                        </div>

                        @error('password')
                        <div class="alert alert-danger mt-2 rounded border-0">
                            {{ $message }}
                        </div>
                        @enderror

                        <button class="btn btn-orange-2 w-100 rounded" type="submit">Masuk</button>
                    </form>
                    <div class="mt-4">
                        <div class="text-center">
                            <span>Belum Punya Akun?</span>
                            <a href="/register" class="text-decoration-none fw-bold text-orange ms-2" wire:navigate>Daftar</a>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>

</div>
