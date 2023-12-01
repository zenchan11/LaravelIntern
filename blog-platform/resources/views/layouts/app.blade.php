<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

  <div class="container mt-4">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('deleted'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('deleted') }}
    </div>
    @endif

    @if(session()->has('failure'))
    <div class="alert alert-danger" role="alert">
      {{ session()->get('failure') }}
    </div>
    @endif

    @if(session()->has('Permission'))
    <div class="alert alert-warning" role="alert">
      {{ session()->get('Permission') }}
    </div>
    @endif

    @if(session()->has('restored'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('restored') }}
    </div>
    @endif

    @if(session()->has('premeanantlyDeleted'))
    <div class="alert alert-danger" role="alert">
      {{ session()->get('premeanantlyDeleted') }}
    </div>
    @endif

    @yield('content')
  </div>

  <footer class="bg-light text-center text-lg-start mt-4">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            © 2023 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright -->
  </footer>

</html>