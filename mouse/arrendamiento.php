
<!DOCTYPE html>
<?php
require_once('../config/conexion.php');



?>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olvido su contraseña</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/HeaderFooter.css">
  <link rel="stylesheet" type="text/css" href="../style/informacion.css">
  <style>
    .inicio{
    padding-bottom: 100px;
    margin-top: 50px;
}
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="content">
      <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
        <div class="container-fluid" id="header">
          <a class="navbar-brand Logo" href="../index.php"><img src="../Imagenes/Logo.png" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link rojo" id="mapa" href="../mapa.php">Mapa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link amarillo" id="calendario" href="../calendario.php">Calendario</a>
              </li>
              <?php
              if (isset($_SESSION['user_id'])) {
                echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="../reg_establecimiento.php">registra tu establecimiento</a>
                            </li>';
              } else {
                echo '';
              }
              if (isset($_SESSION['user_id'])) {
                echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../Imagenes/usuario.png" alt="Imagen de perfil" width="32" height="32"> 
                                    
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown" style="margin-left: -18px; margin-top:10px;">
                                <span class="user-info-container nombreUsuario" style="background-color: red; color: white; ">' . $_SESSION['nombres'] . '</span>
                                    <br>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userModal">Opciones</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmLogoutModal">Cerrar sesión</a>
                                </div>
                            </li>';
              } else {
                echo '<li class="nav-item">
                        <a class="nav-link rojo" id="main" href="../main.php">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link amarillo" id="registro" href="../registro.php">Registro</a>
                    </li>';
              }

              ?>


              <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="userModalLabel">Mis Datos</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="editForm" method="post" action="php/actualizar.php">
                        <ul class="list-group">
                          <li class="list-group-item">Nombre: <span id="nombreUsuario">
                              <?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>
                            </span>
                            <input type="text" name="nuevoNombre" id="editNombre" class="form-control" required>
                          </li>
                          <li class="list-group-item">Apellido: <span id="apellidoUsuario">
                              <?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>
                            </span>
                            <input type="text" name="nuevoApellido" id="editApellido" class="form-control" required>
                          </li>
                          <li class="list-group-item">Correo: <span id="correoUsuario">
                              <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>
                            </span>
                            <input type="email" name="nuevoCorreo" id="editCorreo" class="form-control" required>
                          </li>
                        </ul>
                        <br>
                        <button type="submit" id="btnGuardarCambios" class="btn btn-success">Guardar Cambios</button>
                      </form>

                    </div>
                    <div class="modal-footer">
                      <button id="btnConfirmar" class="btn btn-success" style="display: none;">Confirmar</button>
                      <button id="btnCancelar" class="btn btn-secondary" style="display: none;">Cancelar</button>
                      <a id="btnEliminarCuenta" class="btn btn-danger" href="#" data-toggle="modal"
                        data-target="#confirmEliminarModal">Eliminar Cuenta</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="confirmEditarModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmEditarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmEditarModalLabel">Confirmar Edición</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿Estás seguro de que deseas guardar los cambios?
                    </div>
                    <div class="modal-footer">
                      <button id="btnGuardar" class="btn btn-success">Guardar Cambios</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>


              <div class="modal fade" id="confirmEliminarModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmEliminarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmEliminarModalLabel">Confirmar Eliminar Cuenta</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.
                    </div>
                    <div class="modal-footer">
                      <form method="post" action="php/eliminar.php">
                        <button id="btnConfirmarEliminar" class="btn btn-danger">Eliminar Cuenta</button>
                      </form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar cierre de sesión
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿Estás seguro de que quieres cerrar sesión?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <a class="btn btn-primary" href="../php/logout.php">Cerrar sesión</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                      Debes estar logeado/Registrado para utilizar este servicio.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

              <!-- Asegúrate de que jQuery esté cargado antes de este script -->
              <script>
                $(document).ready(function () {
                  // Agrega un evento que se active cuando se muestre el modal
                  $('#userModal').on('show.bs.modal', function () {
                    // Llena los elementos HTML con los datos del usuario
                    $('#nombreUsuario').text('<?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>');
                    $('#apellidoUsuario').text('<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>');
                    $('#correoUsuario').text('<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>');
                  });
                });
              </script>


              <script>
                $(document).ready(function () {
                  // Agrega un evento de clic al botón "Editar Datos"
                  $('#btnEditar').click(function () {
                    // Muestra los campos de entrada de datos y oculta el botón de edición
                    $('#nombreUsuario, #apellidoUsuario, #correoUsuario').hide();
                    $('#editNombre, #editApellido, #editCorreo').show();
                    $('#btnGuardarCambios, #btnCancelar').show();
                    $('#btnEditar').hide();
                  });

                  // Agrega un evento de clic al botón "Cancelar"
                  $('#btnCancelar').click(function () {
                    // Oculta los campos de entrada de datos y muestra el botón de edición
                    $('#nombreUsuario, #apellidoUsuario, #correoUsuario').show();
                    $('#editNombre, #editApellido, #editCorreo').hide();
                    $('#btnGuardarCambios, #btnCancelar').hide();
                    $('#btnEditar').show();
                  });
                });
              </script>
            </ul>
          </div>
        </div>
      </nav>

      <div class="inicio">
        <input type="text" id="searchInput" placeholder="Buscar tarjetas">

        <!-- Dividir las tarjetas en dos contenedores separados -->
        <div class="cards" id="page1">
          <!-- ... Tus primeras 8 tarjetas van aquí1 ... -->
          <div class="card" id="card1">
            <img class="card__image" src="../Imagenes/parques/Parque Central Bavaria.jpeg" alt="">
            <div class="card__content">
              <h3>
                Apartamento Personal
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./mundo_aventura.php" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card " id="card2">
            <img class="card__image" src="../Imagenes/parques/jardin-botanico-de-bogota.jpg" alt="">
            <div class="card__content">
              <h3>
                Jardín Botánico Jose Celestino Mutis
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="../" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card3">
            <img class="card__image" src="../Imagenes/parques/Parque 93.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque 93
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="../" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card4">
            <img class="card__image" src="../Imagenes/parques/Parque Central Simon Bolivar.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Simon Bolivar
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="../" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card5">
            <img class="card__image" src="../Imagenes/parques/parque usaquen.png" alt="">
            <div class="card__content">
              <h3>
                Parque de Usaquen
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="../" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card6">
            <img class="card__image" src="../Imagenes/parques/Parque El Virrey.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Virrey
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="../" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card7">
            <img class="card__image" src="../Imagenes/parques/Parque El Lago.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Lago
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card8">
            <img class="card__image" src="../Imagenes/parques/Parque de Los Novios.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque de Los Novios
              </h3>
              <p>

              </p>

            </div>

            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
        </div>

        <div class="cards" id="page2">
          <!-- ... Tus siguientes 8 tarjetas van aquí ... -->
          <div class="card" id="card1">
            <img class="card__image" src="./Imagenes/parques/Parque Central Bavaria.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Bavaria
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./mundo_aventura.php" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card " id="card2">
            <img class="card__image" src="../Imagenes/parques/jardin-botanico-de-bogota.jpg" alt="">
            <div class="card__content">
              <h3>
                Jardín Botánico Jose Celestino Mutis
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card3">
            <img class="card__image" src="../Imagenes/parques/Parque 93.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque 93
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card4">
            <img class="card__image" src="../Imagenes/parques/Parque Central Simon Bolivar.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Simon Bolivar
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card5">
            <img class="card__image" src="./Imagenes/parques/parque usaquen.png" alt="">
            <div class="card__content">
              <h3>
                Parque de Usaquen
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card6">
            <img class="card__image" src="./Imagenes/parques/Parque El Virrey.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Virrey
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card7">
            <img class="card__image" src="./Imagenes/parques/Parque El Lago.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Lago
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card8">
            <img class="card__image" src="./Imagenes/parques/Parque de Los Novios.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque de Los Novios
              </h3>
              <p>

              </p>

            </div>

            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>

          </div>
          <div class="pagination">
            <button id="prevButton">Anterior</button>
            <span id="pageIndicator">Página 1</span>
            <button id="nextButton">Siguiente</button>
          </div>
        </div>
      </div>
      <br><br><br><br><br>
      <!-- Botones de paginación y marcador de página -->
      <?php
      include('../modales_footer.php');
      ?>
      <footer class="footer">
        <nav>
          <ul>
            <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de privacidad</a></li>
            <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y condiciones</a></li>
            <li><a href="#">Contacto</a></li>
            <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '';
                    } else {
                        echo '<li><a data-toggle="modal" data-target="#myModal" href="#">deseas registrar tu establecimiento</a></li>';
                    }
                    ?>

                </ul>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                Debes estar logeado/Registrado para utilizar este servicio.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
          <br>
          <p>© 2023 MyBog. Todos los derechos reservados.</p>
        </nav>
      </footer>
    </div>
    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script>
      (function () {
        const searchInput = document.getElementById("searchInput");
        const cards = document.querySelectorAll(".card");

        searchInput.addEventListener("input", function () {
          const searchTerm = searchInput.value.toLowerCase();

          cards.forEach(card => {
            const content = card.querySelector(".card__content p").textContent.toLowerCase();
            const title = card.querySelector(".card__content h3").textContent.toLowerCase();

            if (title.includes(searchTerm) || content.includes(searchTerm)) {
              card.style.display = "block";
            } else {
              card.style.display = "none";
            }
          });
        });
      })();
    </script>

    <!-- Bloque de código para la funcionalidad de logout y paginación -->
    <script>
      (function () {
        document.getElementById('logout-form').addEventListener('submit', function (event) {
          event.preventDefault();
          $('#confirmLogoutModal').modal('show');
        });

        document.getElementById('confirm-logout-btn').addEventListener('click', function (event) {
          document.getElementById('logout-form').submit();
        });
      })();
    </script>

    <script>
      // Obtén todas las tarjetas
      const cards = document.querySelectorAll('.card');

      // Define la cantidad de tarjetas por página
      const cardsPerPage = 8;

      // Inicializa la página actual
      let currentPage = 1;

      // Función para mostrar u ocultar las tarjetas según la página
      function showCards() {
        cards.forEach((card, index) => {
          if (index >= (currentPage - 1) * cardsPerPage && index < currentPage * cardsPerPage) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }

      // Función para actualizar la indicación de la página actual
      function updatePageIndicator() {
        const pageIndicator = document.getElementById('pageIndicator');
        pageIndicator.textContent = `Página ${currentPage}`;
      }

      // Función para ir a la página anterior
      function goToPreviousPage() {
        if (currentPage > 1) {
          currentPage--;
          showCards();
          updatePageIndicator();
        }
      }

      // Función para ir a la página siguiente
      function goToNextPage() {
        const totalPages = Math.ceil(cards.length / cardsPerPage);
        if (currentPage < totalPages) {
          currentPage++;
          showCards();
          updatePageIndicator();
        }
      }

      // Agrega event listeners a los botones de paginación
      const prevButton = document.getElementById('prevButton');
      const nextButton = document.getElementById('nextButton');

      prevButton.addEventListener('click', goToPreviousPage);
      nextButton.addEventListener('click', goToNextPage);

      // Mostrar la página inicial
      showCards();
      updatePageIndicator();
    </script>
    <style>
      .pagination {
        padding-left: 1px;
      }

      .pagination button {
        color: black;
        border: none;
        margin-left: 20px;

      }

      .pagination button:hover {
        background-color: yellow;
        background: #ff0000;
        color: #ffcf11;
        border-radius: 5px;
        box-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0202, 0 0 20px #ff0000;
      }

      .pagination button:active,
      .pagination button:focus {
        outline: none;
      }


      #pageIndicator {
        margin-left: 20px;
      }
    </style>





</body>

</html>
</iframe>