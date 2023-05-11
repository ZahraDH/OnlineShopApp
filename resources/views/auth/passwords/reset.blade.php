<!DOCTYPE html>
<html>
    <head>
        @include('../../includes/head')
    </head>
    <body>
        <section class="user-form-part">
            <div class="container">
                <div class="row justify-content-center al">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5" style="margin-top: 60px ">
                        <div class="user-form-card">
                            <div class="user-form-title">
                                <h2>بازیابی رمز عبور</h2>
                            </div>
        
                            <form method="POST" action="{{ route('password.update') }}" class="user-form">
                                @csrf
        
                                <input type="hidden" name="token" value="{{ $token }}">
        
                                <div class="form-group">
                                    <label for="email">{{ __('ایمیل') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="password">{{ __('رمز عبور') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('تایید رمز عبور') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
                                <div class="form-button">
                                    <button type="submit">
                                        {{ __('بازیابی رمز عبور') }}
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('../../includes/script')
    </body>
</html>