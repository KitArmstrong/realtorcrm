<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Realtor CRM - Your tool for realty success!">

  <title>{{ config('app.name', 'Realtor CRM') }}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <!-- Vendors -->
  <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/fontawesome-all.min.css') }}">
  <!-- Main styles for this application -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="appshell">
    <App />
  </div>
  <!-- Main script -->
  <script src="js/app.js"></script>
</body>
</html>