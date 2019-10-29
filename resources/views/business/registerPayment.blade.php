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
                            <img src="/images/progress4.png" style="padding-bottom: 20px">
                        </div>

                        <div class="form-group row teal" style="justify-content: center; font-weight: bold; font-size: 24px">
                            Your first 30 days are on us! We’ll email you a reminder three days before your trial ends. If you cancel during these three days you won’t be charged. If you don’t cancel, your account will automatically be charged at the start of each month.
                        </div>


                        <div class="form-group row col-md-12" style="font-weight: bold; font-size: 18px">
                            Add Payment Details
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
                                    {{ __('Finish') }}
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
