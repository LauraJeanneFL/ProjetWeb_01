{{ include('layouts/header.php', {title:'Error 404'})}}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <div class="container">
        <h2>Error</h2>
        <strong class="error"> 404 page not found! </strong>
        <p>{{ msg }}</p>
    </div>
{{include('layouts/footer.php')}}