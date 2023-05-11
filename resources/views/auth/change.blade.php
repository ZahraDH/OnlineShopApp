<!DOCTYPE html>
<html lang="en">

<head>
    @include('../includes/head')
</head>

<body>


    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:50px">
                <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5">
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>رمز عبور خود را تغییر دهید!</h2>
                        </div>
                        <form class="user-form" action="{{route('change-password')}}" method="POST">
                            @csrf
                            <div class="form-group"><label for="old_password">رمز عبور قدیمی</label><input type="password"
                                    class="form-control" placeholder="رمز ورود قدیمی را وارد کنید" name="old_password"></div>
                                    @if ($message = Session::get('failed'))

                                    <div class="alert alert-danger">
                    
                                    <p>{{ $message }}</p>
                    
                                    </div>
                    
                                    @endif
                            <div class="form-group"><label for="password">رمز عبور جدید</label><input type="password"
                                    class="form-control" placeholder="گذرواژه جدید وارد کنید" name="password"></div>
                            <div class="form-group"><label for="confirm-password">رمز ورود را تأیید کنید</label><input type="password"
                                    class="form-control" placeholder="رمز ورود را تأیید کنید" name="confirm-password"></div>
                            <div class="form-button">
                                <button type="submit">رمز عبور را تغییر دهید</button>
                            </div>
                        </form>
                    </div>
                    <div class="user-form-footer">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('../includes/script')

</body>

</html>