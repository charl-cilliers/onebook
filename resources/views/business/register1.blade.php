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
                    <form method="POST" action="{{ route('register1') }}">
                        @csrf

                        <div class="img">
                            <img src="/images/Group_2_1.png" alt="Logo" style="height: 75px; padding-bottom: 20px">
                        </div>

                        <div class="img">
                            <img src="/images/progress2.png" style="padding-bottom: 20px">
                        </div>

                        <div class="form-group row teal" style="justify-content: center; font-weight: bold; font-size: 24px">
                            List the names of individuals who provide services at your business. Only you? Simply add your business or your own details.
                        </div>


                        <div class="form-group row col-md-12" style="font-weight: bold; font-size: 18px">
                            Add Service Provider(s)
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-6">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                            </div>

                            <div class="row col-md-6" style="padding-left: 35px">
                                <label for="surname" class="col-form-label text-md-right">{{ __('Surname') }}</label>
                            </div>

                            <div class="row col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Service Provider Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" placeholder="Service Provider Surname" value="{{ old('industry') }}">

                            </div>
                        </div>

                        <div class="form-group row mb-0" style="padding-bottom: 20px">
                            <div class="col-md-6 offset-md-4">

                                <button type="button" onclick="window.location='{{ url("") }}'" class="btn btn-primary" style="width: 300px">
                                    {{ __('Add Another') }}
                                </button>

                            </div>
                        </div>

                        <div class="form-group row mb-0" style="padding-bottom: 20px">
                            <div class="col-md-6 offset-md-4">
                                <button onclick="goBack()" class="btn btn-primary" style="background-color: white; color: rgba(26, 128, 129, 1)">Back</button>

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
