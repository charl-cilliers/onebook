@extends('layouts.app')

<style>
    .img {
        text-align: center;
    }

    html, body, form, title, card{
        background-color: #fff;
        color: #636b6f;
        font-family: 'Comfortaa', cursive;
    }

    .teal {
        color: rgba(26, 128, 129, 1);
    }

</style>

<script>
    function goBack() {
        window.history.back()
    }
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('postRegister') }}">
                        @csrf

                        <div class="img">
                            <img src="/images/Group_2_1.png" alt="Logo" style="height: 75px; padding-bottom: 20px">
                        </div>

                        <div class="img">
                            <img src="/images/progress1.png" style="padding-bottom: 20px">
                        </div>

                        <div class="form-group row teal" style="justify-content: center; font-weight: bold; font-size: 24px">
                            Tell us about your business.
                        </div>

                        <div class="form-group row col-md-12" style="font-weight: bold; font-size: 18px">
                            Business Profile Details
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-6">
                            <label for="name" class="col-form-label text-md-right">{{ __('Business Name') }}</label>
                            </div>

                            <div class="row col-md-6" style="padding-left: 35px">
                                <label for="industry" class="col-form-label text-md-right">{{ __('Industry') }}</label>
                            </div>

                            <div class="row col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-valid @enderror" name="name" placeholder="What is your business called?" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="industry" type="text" class="form-control" name="industry" placeholder="Select the most relevant industry" value="{{ old('industry') }}">

                            </div>
                        </div>

                        {{--<div class="form-group row col-md-6">--}}
                            {{--<div class="row col-md-6">--}}
                                {{--<label for="industry" class="col-form-label text-md-right">{{ __('Industry') }}</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="industry" type="text" class="form-control" name="industry" placeholder="Select the most relevant industry" value="{{ old('industry') }}">--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="description" class="col-form-label text-md-right">{{ __('Business Description') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="description" type="text" class="form-control" name="description" placeholder="Describe your business">

                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="location" class="col-form-label text-md-right">{{ __('Business Location') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="location" class="form-control" name="location" placeholder="What is your business address?" value="{{ old('location') }}">

                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="mobile_number" class="col-form-label text-md-right">{{ __('Business Mobile Number') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="mobile_number" type="text" class="form-control" name="mobile_number" placeholder="What is your business' mobile number?" value="{{ old('mobile_number') }}">

                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="email" class="col-form-label text-md-right">{{ __('Business Email') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-valid @enderror" name="email" placeholder="What is your business' contact email address?" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            </div>

                            <div class="row col-md-6" style="padding-left: 35px">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="row col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Create secure password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                            </div>
                        </div>

                        {{--<div class="form-group row">--}}
                            {{--<div class="row col-md-6">--}}
                                {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group row mb-0" style="padding-bottom: 20px">
                            <div class="col-md-6 offset-md-4">
                                <button onclick="goBack()" class="btn btn-primary" style="background-color: white; color: rgba(26, 128, 129, 1)">Cancel</button>

                                <button type="submit"  class="btn btn-primary" style="width: 80px; background-color: rgba(26, 128, 129, 1)">
                                    {{ __('Next') }}
                                </button>

                            </div>
                        </div>

                        <div style="text-align: center">
                            By registering you agree to our Terms and Conditions
                        </div>

                        <div style="text-align: center">
                            Already have an account? <a href="{{ route('login') }}">Log In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
