<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>-</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="<?php echo CSS.'form-validation.css'; ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="<?php echo IMAGES.'bee_logo.png' ?>" alt="<?php echo get_sitename() ?>" width="150">
    <h2>Administra tus finanzas</h2>
    <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, ullam.</p>
  </div>

  <div class="row">
    <!-- formulario -->
    <div class="col-xl-8">
      <div class="card">
        <div class="card-header">
          <h4>Agrega un nuevo movimiento</h4>
        </div>
        <div class="card-body">
          <form class="needs-validation" novalidate>
            <div class="form-group row">
              <div class="col-xl-6">
                <label for="country">Tipo de movimiento</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Selecciona...</option>
                  <option value="expense">Gasto</option>
                  <option value="income">Ingreso</option>
                </select>
                <div class="invalid-feedback">
                  Selecciona un tipo de movimiento válido
                </div>
              </div>
              <div class="col-xl-6">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" placeholder="Descripción" value="" required>
                <div class="invalid-feedback">
                  Ingresa una descripción
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="amount">Monto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" id="amount" placeholder="0.00" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Ingresa un monto válido
                </div>
              </div>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>
    </div>

    <!-- lista de movimientos -->
    <div class="col-xl-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Movimientos</span>
        <span class="badge badge-secondary badge-pill">123</span>
      </h4>
      <ul class="list-group mb-3">

        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div class="text-success">
            <h6 class="my-0">Ingreso</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <button class="btn btn-sm btn-danger float-right"><i class="fas fa-trash"></i></button>
          <span class="text-success">$12.00</span>
        </li>

        <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
          <div class="text-danger">
            <h6 class="my-0">Gasto</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-danger">-$8.00</span>
        </li>
      </ul>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
          <span>Subtotal (MXN)</span>
          <strong>$17.24</strong>
        </li>

        <li class="list-group-item d-flex justify-content-between">
          <span>Impuestos (16%)</span>
          <strong>$3.20</strong>
        </li>

        <li class="list-group-item d-flex justify-content-between">
          <span>Total (MXN)</span>
          <strong>$20.00</strong>
        </li>
      </ul>
    </div>
  </div>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1"><?php echo get_sitename().' '.date('Y').' &copy; Todos los derechos reservados.'; ?></p>
</footer>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation')

      // Loop over them and prevent submission
      Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    }, false)
  }())
</script>

</body>
</html>
