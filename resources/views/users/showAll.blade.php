<!DOCTYPE html>
<html lang="en">

<head>
    <title>Real-time Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<!-- Notificación para eventos de sesión -->
<div id="notification" class="alert invisible fixed-top m-3"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <ul id="users" class="list-unstyled">
                        <!-- Los usuarios se cargarán dinámicamente aquí -->



                    </ul>
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

<script type="text/javascript">
    $(document).ready(function(){

        window.axios.get('/api/users')
            .then((response) => {
                const usersElement = document.getElementById('users');
                let users = response.data;

                users.forEach((user, index) => {
                    let element = document.createElement('li');

                    element.setAttribute('id', user.id);
                    element.innerText = user.name;

                    usersElement.appendChild(element);
                });
            });
    });
</script>
