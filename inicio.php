<?php
session_start();
include 'Verificacion/verificar_sesion.php';

include 'conexion.php';
   
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
                <p class="name">Agendas</p>
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
                    <img src="<?php echo $user['imagen_perfil']; ?>" alt="Imagen de perfil">

                    <span><?php echo $user['nombre_1']. ' ' .substr($user['apellido_1'], 0, 1).'.';?></span>
                </button>
                
            </div>
        </nav>
        <main>
            <div class="app-sidebar">
                    <a href="" class="app-sidebar-link active">
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

            </div>
            <div class="projects-section">
                <div class="projects-section-header">
                    <p>Projects</p>
                    <p class="time">December, 12</p>
                </div>
                <div class="projects-section-line">
                    <div class="projects-status">
                    <div class="item-status">
                        <span class="status-number">45</span>
                        <span class="status-type">In Progress</span>
                    </div>
                    <div class="item-status">
                        <span class="status-number">24</span>
                        <span class="status-type">Upcoming</span>
                    </div>
                    <div class="item-status">
                        <span class="status-number">62</span>
                        <span class="status-type">Total Projects</span>
                    </div>
                    </div>
                    <div class="view-actions">
                    <button class="view-btn list-view" title="List View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="view-btn grid-view active" title="Grid View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                    </div>
                </div>
                <div class="project-boxes jsGridView">
                    <div class="project-box-wrapper">
                    <div class="project-box" style="background-color: #fee4cb;">
                        <div class="project-box-header">
                        <span>December 10, 2020</span>
                        <div class="more-wrapper">
                            <button class="project-btn-more">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="12" cy="5" r="1"></circle>
                                <circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">Web Designing</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 60%; background-color: #ff942e"></span>
                    </div>
                    <p class="box-progress-percentage">60%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
                        <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">
                        <button class="add-participant" style="color: #ff942e;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #ff942e;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
                <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #e9e7fd;">
                    <div class="project-box-header">
                    <span>December 10, 2020</span>
                    <div class="more-wrapper">
                        <button class="project-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">Testing</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 50%; background-color: #4f3ff0"></span>
                    </div>
                    <p class="box-progress-percentage">50%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1215&amp;q=80" alt="participant">
                        <img src="https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2555&amp;q=80" alt="participant">
                        <button class="add-participant" style="color: #4f3ff0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #4f3ff0;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
                <div class="project-box-wrapper">
                <div class="project-box">
                    <div class="project-box-header">
                    <span>December 10, 2020</span>
                    <div class="more-wrapper">
                        <button class="project-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">Svg Animations</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 80%; background-color: #096c86"></span>
                    </div>
                    <p class="box-progress-percentage">80%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1587628604439-3b9a0aa7a163?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjR8fHdvbWFufGVufDB8fDB8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">
                        <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1215&amp;q=80" alt="participant">
                        <button class="add-participant" style="color: #096c86;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #096c86;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
                <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #ffd3e2;">
                    <div class="project-box-header">
                    <span>December 10, 2020</span>
                    <div class="more-wrapper">
                        <button class="project-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">UI Development</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 20%; background-color: #df3670"></span>
                    </div>
                    <p class="box-progress-percentage">20%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
                        <img src="https://images.unsplash.com/photo-1587628604439-3b9a0aa7a163?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjR8fHdvbWFufGVufDB8fDB8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">
                        <button class="add-participant" style="color: #df3670;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #df3670;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
                <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #c8f7dc;">
                    <div class="project-box-header">
                    <span>December 10, 2020</span>
                    <div class="more-wrapper">
                        <button class="project-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">Data Analysis</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 60%; background-color: #34c471"></span>
                    </div>
                    <p class="box-progress-percentage">60%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
                        <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">
                        <button class="add-participant" style="color: #34c471;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #34c471;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
                <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #d5deff;">
                    <div class="project-box-header">
                    <span>December 10, 2020</span>
                    <div class="more-wrapper">
                        <button class="project-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </div>
                    </div>
                    <div class="project-box-content-header">
                    <p class="box-content-header">Web Designing</p>
                    <p class="box-content-subheader">Prototyping</p>
                    </div>
                    <div class="box-progress-wrapper">
                    <p class="box-progress-header">Progress</p>
                    <div class="box-progress-bar">
                        <span class="box-progress" style="width: 40%; background-color: #4067f9"></span>
                    </div>
                    <p class="box-progress-percentage">40%</p>
                    </div>
                    <div class="project-box-footer">
                    <div class="participants">
                        <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
                        <img src="https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2555&amp;q=80" alt="participant">
                        <button class="add-participant" style="color: #4067f9;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        </button>
                    </div>
                    <div class="days-left" style="color: #4067f9;">
                        2 Days Left
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            
            <div class="messages-section">
                
                <div class="projects-section-header">
                    <p>Client Messages</p>
                </div>
                <div class="messages">
                    <div class="message-box">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="profile image">
                    <div class="message-content">
                        <div class="message-header">
                        <div class="name">Stephanie</div>
                        <div class="star-checkbox">
                            <input type="checkbox" id="star-1">
                            <label for="star-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </label>
                        </div>
                        </div>
                        <p class="message-line">
                        I got your first assignment. It was quite good. 🥳 We can continue with the next assignment.
                        </p>
                        <p class="message-line time">
                        Dec, 12
                        </p>
                    </div>
                    </div>
                    <div class="message-box">
                    <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="profile image">
                    <div class="message-content">
                        <div class="message-header">
                        <div class="name">Mark</div>
                        <div class="star-checkbox">
                            <input type="checkbox" id="star-2">
                            <label for="star-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </label>
                        </div>
                        </div>
                        <p class="message-line">
                        Hey, can tell me about progress of project? I'm waiting for your response.
                        </p>
                        <p class="message-line time">
                        Dec, 12
                        </p>
                    </div>
                    </div>
                    <div class="message-box">
                    <img src="https://images.unsplash.com/photo-1543965170-4c01a586684e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDZ8fG1hbnxlbnwwfDB8MHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="profile image">
                    <div class="message-content">
                        <div class="message-header">
                        <div class="name">David</div>
                        <div class="star-checkbox">
                            <input type="checkbox" id="star-3">
                            <label for="star-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </label>
                        </div>
                        </div>
                        <p class="message-line">
                        Awesome! 🤩 I like it. We can schedule a meeting for the next one.
                        </p>
                        <p class="message-line time">
                        Dec, 12
                        </p>
                    </div>
                    </div>
                    <div class="message-box">
                    <img src="https://images.unsplash.com/photo-1533993192821-2cce3a8267d1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTl8fHdvbWFuJTIwbW9kZXJufGVufDB8fDB8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="profile image">
                    <div class="message-content">
                        <div class="message-header">
                        <div class="name">Jessica</div>
                        <div class="star-checkbox">
                            <input type="checkbox" id="star-4">
                            <label for="star-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </label>
                        </div>
                        </div>
                        <p class="message-line">
                        I am really impressed! Can't wait to see the final result.
                        </p>
                        <p class="message-line time">
                        Dec, 11
                        </p>
                    </div>
                    </div>
                </div>
                </div>
        </main>

        <script src="js/script.js"></script>
</body>
</html>