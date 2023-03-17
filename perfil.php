<?php

session_start();
include 'conexion.php';
include 'Verificacion/verificar_sesion.php';

$userId = $_SESSION['usuario'];

$query = "SELECT * FROM usuarios WHERE id_usuario = ?";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Usuario no encontrado
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
        <nav>
            <div class="app-header-left">
            <a href="" class="app-navbar-link">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
			</svg>
            </a>
                <p class="name">Perfil</p>
                <div class="search-wrapper">
                    <input class="search-input" type="text" placeholder="Buscar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                    <defs></defs>
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
            </div>
            <div class="app-header-right">
                
                <button class="mode-switch" title="Switch Theme" onclick="toggleDarkMode()">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                    <defs></defs>
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
                
                <button class="add-btn" title="Add New Project">
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
                <button class="notification-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                </button>
                <button class="profile-btn" onclick="redirige()">
                    <img src="<?php echo $user['imagen_perfil'];?>"  >
                    <span>Manuel M.</span>
                </button>
                
            </div>
        </nav>
        <main>
        <div class="app-sidebar">
                    <a href="" class="app-sidebar-link ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </a>
                    <a href="" class="app-sidebar-link">
                        <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z"></path>
                        </svg>
                    </a>
                    <a href="" class="app-sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </a>
                    <a href="" class="app-sidebar-link">
                        <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"></path>
                        </svg>
                    </a>
                    <a href="" class="app-sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-log-out" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"></path>
            </svg>
            </a>
            </div>

            <div class="projects-section projects-profile">
            <div class="button-container">
                <button id="perfil-btn" data-section="#perfil" class="is-active">Perfil</button>
                <button id="carta-presentacion-btn" data-section="#carta_presentacion">Carta Presentación</button>
            </div>
            <div class="profile-container" onclick="redirige()">
                <button class="profile-main-btn">
                    <img src="<?php echo $user['imagen_perfil'];?>" class="img_profile" alt="Imagen de perfil">
                </button>
                <div class="profile-buttons" id="profile-buttons" style="display:none;">
                    <button id="insert-img-btn">Insertar imagen</button>
                    <input type="file" id="hidden-file-input" accept="image/*" style="display:none;">

                    <button id="delete-img-btn">Eliminar imagen</button>
                    <button id="close-btn">Cerrar</button>
                </div>
            </div>
                <div class="profile_input">
                    <form class="formulario_1 is-active" data-state="#perfil" action="procesar.php" method="POST" enctype="multipart/form-data">

                        <label for="descripcion">Datos Perdonales</label>
                        <div class="input_profile">
                            <input type="text" name="nombre_1" placeholder="Primer Nombre" value="<?php echo $user['nombre_1'];?>" id="nombre_1" required>
                            <input type="text" name="nombre_2" placeholder="Segundo Nombre" value="<?php echo $user['nombre_2'];?>" id="nombre_2" required>
                        </div>
                        <div class="input_profile">
                            <input type="text" name="apellido_1" placeholder="Primer Apellido" value="<?php echo $user['apellido_1'];?>" id="apellido_1" required>
                            <input type="text" name="apellido_2" placeholder="Segundo Apellido" value="<?php echo $user['apellido_2'];?>"  id="apellido_2" required>
                        </div>
                        <div class="input_profile">
                            <input type="text" name="celular" placeholder="Celular" value="<?php echo $user['celular'];?>" id="celular">
                            <input type="text" placeholder="Teléfono" name="telefono" value="<?php echo $user['telefono'];?>" id="telefono">
                        </div>
                        <input type="email" name="correo_electronico" placeholder="Correo Electrónico" value="<?php echo $user['correo_electronico'];?>" id="correo_electronico" required>
                        <input type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $user['contraseña'];?>" id="contraseña" required>
                        <div class="input_profile">
                            <input type="submit" value="Actualizar Datos">
                        </div>
                        </form>

                        <form class="formulario_2"  style="display:none;" data-state="#carta_presentacion" action="procesar.php" method="POST" enctype="multipart/form-data">
                         <label for="descripcion">Carta de Presentación:</label>
                         <div  class="input_profile_2"> 
                            <input type="text" placeholder ="Nombres"name="Nombres" id="Nombres">
                            <input type="text" placeholder="profesión" name="nombre_empresa" id="nombre_empresa">
                         </div>
                        
                        <textarea name="descripcion" placeholder="Descripcion" id="descripcion" maxlength="500" rows="10" cols="50" style="resize: none;"></textarea>
                        
                        <label for="Redes_Sociales">Redes Sociales:</label>
                        <input type="text" name="facebook" placeholder="Link Facebook" id="facebook">
                        <input type="text" name="twitter" placeholder="Link Twitter" id="twitter">
                        <input type="text" name="instragram" placeholder="Link Instragram" id="instragram">
                        <input type="text" name="linkedig" placeholder="Link Linkedig" id="linkedig">

                        <label for="descripcion">Contacto:</label>
                        <input type="text" name="direccion" placeholder="Direccion" id="direccion">
                        <input type="text" name="numero_cel" placeholder="Numero Celular" id="numero_cel">
                        <input type="text" name="email" placeholder="Email" id="email">
                        <div class="input_profile">
                            <input type="submit" value="Actualizar Datos">
                        </div>
                    </form>
                </div>
            </div>
            <div class="messages-section profil">
            <p class="name">Carta de Presentacion</p>
            <div class="button-vis">
            <section title=".slideThree">
    <!-- .slideThree -->
                <div class="slideThree">  
                <input type="checkbox" value="None" id="slideThree" name="check" checked />
                <label for="slideThree"></label>
                </div>
                <!-- end .slideThree -->
            </section>
            </div>
            <div class="card" data-state="#about">
                <div class="card-header">
                    <div class="card-cover" style="background-image: url('<?php echo $user['imagen_perfil'];?>')"></div>
                    <img class="card-avatar" src="<?php echo $user['imagen_perfil'];?>" alt="avatar" />
                    <h1 class="card-fullname">William Rocheald</h1>
                    <h2 class="card-jobtitle">UI Developer</h2>
                </div>
                <div class="card-main">
                    <div class="card-section is-active" id="about">
                    <div class="card-content">
                        <div class="card-subtitle">ABOUT</div>
                        <p class="card-desc">Whatever tattooed stumptown art party sriracha gentrify hashtag intelligentsia readymade schlitz brooklyn disrupt.
                        </p>
                    </div>
                    <div class="card-social">
                        <a href="#"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.997 3.985h2.191V.169C17.81.117 16.51 0 14.996 0c-3.159 0-5.323 1.987-5.323 5.639V9H6.187v4.266h3.486V24h4.274V13.267h3.345l.531-4.266h-3.877V6.062c.001-1.233.333-2.077 2.051-2.077z" /></svg></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" /></svg></a>
                        <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M301 256c0 24.852-20.148 45-45 45s-45-20.148-45-45 20.148-45 45-45 45 20.148 45 45zm0 0" />
                            <path d="M332 120H180c-33.086 0-60 26.914-60 60v152c0 33.086 26.914 60 60 60h152c33.086 0 60-26.914 60-60V180c0-33.086-26.914-60-60-60zm-76 211c-41.355 0-75-33.645-75-75s33.645-75 75-75 75 33.645 75 75-33.645 75-75 75zm86-146c-8.285 0-15-6.715-15-15s6.715-15 15-15 15 6.715 15 15-6.715 15-15 15zm0 0" />
                            <path d="M377 0H135C60.562 0 0 60.563 0 135v242c0 74.438 60.563 135 135 135h242c74.438 0 135-60.563 135-135V135C512 60.562 451.437 0 377 0zm45 332c0 49.625-40.375 90-90 90H180c-49.625 0-90-40.375-90-90V180c0-49.625 40.375-90 90-90h152c49.625 0 90 40.375 90 90zm0 0" /></svg></a>
                        <a href="#"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 002.882 0z" /></svg></a>
                    </div>
                    </div>
                    <!---<div class="card-section" id="experience">
                    <div class="card-content">
                        <div class="card-subtitle">WORK EXPERIENCE</div>
                        <div class="card-timeline">
                        <div class="card-item" data-year="2014">
                            <div class="card-item-title">Front-end Developer at <span>JotForm</span></div>
                            <div class="card-item-desc">Disrupt stumptown retro everyday carry unicorn.</div>
                        </div>
                        <div class="card-item" data-year="2016">
                            <div class="card-item-title">UI Developer at <span>GitHub</span></div>
                            <div class="card-item-desc">Developed new conversion funnels and disrupt.</div>
                        </div>
                        <div class="card-item" data-year="2018">
                            <div class="card-item-title">Illustrator at <span>Google</span></div>
                            <div class="card-item-desc">Onboarding illustrations for App.</div>
                        </div>
                        <div class="card-item" data-year="2020">
                            <div class="card-item-title">Full-Stack Developer at <span>CodePen</span></div>
                            <div class="card-item-desc">Responsible for the encomposing brand expreience.</div>
                        </div>
                        </div>
                    </div>
                    </div> --->
                    <div class="card-section" id="contact">
                    <class="card-content">
                        <div class="card-subtitle">CONTACT</div>
                        <div class="card-contact-wrapper">
                        <div class="card-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                            <circle cx="12" cy="10" r="3" /></svg>
                            Algonquin Rd, Three Oaks Vintage, MI, 49128
                        </div>
                        <div class="card-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" /></svg>(269) 756-9809</div>
                        <div class="card-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <path d="M22 6l-10 7L2 6" /></svg>
                            william@rocheald.com
                        </div>
                        <!---<button class="contact-me">WORK TOGETHER</button>--->
                        </div>
                    </div>
                    </div>
                    <div class="card-buttons">
                    <button data-section="#about" class="is-active">ABOUT</button>
                    <button data-section="#contact">CONTACT</button>
                    </div>
                </div>
                </div>
            </div>
        </main>

        <script src="js/script.js"></script>
</body>
</html>