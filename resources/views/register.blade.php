@extends('layouts.main')

@section('content')
<section class="vh-80 mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow-lg rounded" style="border: none;">
                    <div class="row g-0">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="card-body text-center">
                                <h4 class="mt-3" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #3A4D6B;">SIGN UP</h4>
                                <div style="height: 2px; background-color: #3A4D6B; width: 100%; margin: 10px auto;"></div>

                                @if (session('pesan'))
                                    <div class="alert alert-success mb-3">
                                        {{ session('pesan') }}
                                    </div>
                                @endif

                                <form method="POST" action="/register">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingName" placeholder="Your Name" value="{{ old('name') }}">
                                        <label for="floatingName">Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}">
                                        <label for="floatingEmail">Email Address</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="floatingPasswordConfirm" placeholder="Confirm Password">
                                        <label for="floatingPasswordConfirm">Confirm Password</label>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn w-100 py-2 mb-4" type="submit" style="background-color: #3A4D6B; border-color: #3A4D6B; color: white;">Sign Up</button>

                                    <div class="text-center">Already have an account? <a href="/" style="color: #3A4D6B;">Sign In</a></div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <br>
                            <img src="{{ asset('images/login.jpg') }}" class="img-fluid" alt="Sample image" style="width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
@endsection
