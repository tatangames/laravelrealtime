<!DOCTYPE html>
<html lang="en">

<head>
    <title>Real-time Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .refresh {
        animation: rotate 1.5s linear infinite;
    }
</style>
<body>


<!-- Notificación para eventos de sesión -->
<div id="notification" class="alert invisible fixed-top m-3"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">

                    <div class="text-center">
                        <img id="circle" class="" width="250" height="250" src="{{ asset('images/circle.png') }}">

                        <p id="winner" class="display-1 d-none text-primary">10</p>
                    </div>

                    <hr>

                    <div class="text-center">
                        <label class="font-weight-bold h5">Your bet</label>
                        <select id="bet" class="custom-select col-auto">
                            <option selected>Not in</option>

                            @foreach(range(1,12) as $number)
                                <option>{{ $number }}</option>
                            @endforeach
                        </select>
                        <hr>

                        <p class="font-weight-bold h5">Remaining Time</p>
                        <p id="timer" class="h5 text-danger">Waiting to start</p>
                        <hr>
                        <p id="result" class="h1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/adminlte.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery-ui-drag.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datatables-drag.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/alertaPersonalizada.js') }}"></script>

@vite('resources/js/app.js')

<script>



</script>

