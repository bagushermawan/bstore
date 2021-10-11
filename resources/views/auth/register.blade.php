@extends('layouts.auth')

@section('content')

<!-- Page Content -->
<div class="page-content page-auth mt-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form class="mt-3">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control is-valid" aria-describedby="nameHelp" v-model="name"
                                autofocus />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control is-invalid" aria-describedby="emailHelp"
                                v-model="email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Store</label>
                            <p class="text-muted">
                                Apakah anda juga ingin membuka toko?
                            </p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreTrue"
                                    v-model="is_store_open" :value="true" />
                                <label class="custom-control-label" for="openStoreTrue">Iya, boleh</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="is_store_open"
                                    id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label makasih class="custom-control-label" for="openStoreFalse">Enggak, makasih</label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" aria-describedby="storeHelp" />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Kategori</label>
                            <select name="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Sign Up Now
                        </button>
                        <button type="submit" class="btn btn-signup btn-block mt-2">
                            Back to Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="display:none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="/public/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
          this.$toasted.error(
            "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
            {
              position: "top-center",
              className: "rounded",
              duration: 1000,
            }
          );
        },
        data: {
          name: "Angga Hazza Sett",
          email: "kamujagoan@bwa.id",
          password: "",
          is_store_open: true,
          store_name: "",
        },
      });
    </script>
@endpush