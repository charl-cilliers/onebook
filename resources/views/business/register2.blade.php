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
                            <img src="/images/progress3.png" style="padding-bottom: 20px">
                        </div>

                        <div class="form-group row teal" style="justify-content: center; font-weight: bold; font-size: 24px">
                            Simply add the details of the service(s) your company provides. You can add as many as you want! Then link the service to your individual service providers.
                        </div>


                        <div class="form-group row col-md-12" style="font-weight: bold; font-size: 18px">
                            Add Service(s)
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-6">
                            <label for="name" class="col-form-label text-md-right">{{ __('Service Name') }}</label>
                            </div>

                            <div class="row col-md-6" style="padding-left: 35px">
                                <label for="industry" class="col-form-label text-md-right">{{ __('Service Price') }}</label>
                            </div>

                            <div class="row col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name your service" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" placeholder="How much does service typically cost?" value="{{ old('price') }}">

                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="description" class="col-form-label text-md-right">{{ __('Service Description') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="description" type="text" class="form-control" name="description" placeholder="Describe this service">

                            </div>
                        </div>

                        <div class="form-group row col-md-12" style="font-weight: bold; font-size: 18px">
                            Link Service Provider(s)
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-6">
                                <label for="name" class="col-form-label text-md-right">{{ __('Service Provider') }}</label>
                            </div>

                            <div class="row col-md-6" style="padding-left: 35px">
                                <label for="industry" class="col-form-label text-md-right">{{ __('Service Cost') }}</label>
                            </div>

                            <div class="row col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name your service" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" placeholder="How much does service typically cost?" value="{{ old('price') }}">

                            </div>
                        </div>

                        <div class="form-group row col-md-12 teal">
                            <div class="row col-md-12">
                                <label for="description" class="col-form-label text-md-right">{{ __('Service Duration') }}</label>
                            </div>

                            <div class="row col-md-12">
                                <input id="duration" type="text" class="form-control" name="duration" placeholder="How long does this provider take?" value="{{ old('duration') }}">

                            </div>
                        </div>

                        <div class="form-group row mb-0" style="padding-bottom: 20px">
                            <div class="col-md-6 offset-md-4">

                                <button type="button" onclick="window.location='{{ url("") }}'" class="btn btn-primary" style="width: 300px">
                                    {{ __('Add Service') }}
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
