//---------------------------------Funciones-------------------------
function uploadImage(file) {
    const formData = new FormData();
    formData.append("image", file);

    // Reemplaza la URL con la dirección de tu archivo PHP para procesar la subida de imágenes
    const uploadUrl = "upload_image.php";

    fetch(uploadUrl, {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            // Actualizar la imagen de perfil y guardar la dirección en la base de datos
            const imageUrl = "img/" + data.imageName;
            document.querySelector(".img_profile").src = imageUrl;
            // Aquí puedes guardar la dirección de la imagen en la base de datos
        } else {
            console.error("Error al subir la imagen:", data.message);
        }
    })
    .catch((error) => {
        console.error("Error al subir la imagen:", error);
    });
}


//---------------------------------login------------------------------
//Ejecutando funciones
if (window.location.pathname.endsWith('login.php')) {
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}
//---- mostrar contraseña ----
document.getElementById("togglePasswordLogin").addEventListener("click", function () {
    togglePasswordVisibility("passwordLogin", this);
});

document.getElementById("togglePasswordRegister").addEventListener("click", function () {
    togglePasswordVisibility("passwordRegister", this);
});

function togglePasswordVisibility(passwordId, eyeIcon) {
    const passwordInput = document.getElementById(passwordId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}
}
/*-----DACK-----*/
function toggleDarkMode() {
    const bodyElement = document.querySelector('html');
    bodyElement.classList.toggle('dark');
}

function redirige() {
    window.location.href = 'perfil.php';
}


if (window.location.pathname.endsWith('perfil.php')) {
    /*-----profile-card----*/
    const buttons = document.querySelectorAll(".card-buttons button");
    const sections = document.querySelectorAll(".card-section");
    const card = document.querySelector(".card");

    function handleButtonClick(e) {
        const targetSection = e.target.getAttribute("data-section");
        const section = document.querySelector(targetSection);
        if (targetSection !== "#about") {
            card.classList.add("is-active");
        } else {
            card.classList.remove("is-active");
        }
        card.setAttribute("data-state", targetSection);
        sections.forEach(function(s) {
            s.classList.remove("is-active");
        });
        buttons.forEach(function(b) {
            b.classList.remove("is-active");
        });
        e.target.classList.add("is-active");
        section.classList.add("is-active");
    }

    buttons.forEach(function(btn) {
        btn.addEventListener("click", handleButtonClick);
    });


        const perfilBtn = document.getElementById('perfil-btn');
        const cartaPresentacionBtn = document.getElementById('carta-presentacion-btn');
        const formulario1 = document.querySelector('.formulario_1');
        const formulario2 = document.querySelector('.formulario_2');

        function toggleFormVisibility() {
            if (formulario1.classList.contains('is-active')) {
            formulario1.classList.remove('is-active');
            formulario1.style.display = 'none';
            formulario2.style.display = 'block';
            perfilBtn.classList.remove('is-active');
            cartaPresentacionBtn.classList.add('is-active');
            } else {
            formulario1.classList.add('is-active');
            formulario1.style.display = 'block';
            formulario2.style.display = 'none';
            perfilBtn.classList.add('is-active');
            cartaPresentacionBtn.classList.remove('is-active');
            }
        }

  perfilBtn.addEventListener('click', toggleFormVisibility);
  cartaPresentacionBtn.addEventListener('click', toggleFormVisibility);



    function redirige() {
        const profileButtons = document.getElementById("profile-buttons");
        profileButtons.style.display = "flex"; 
        profileButtons.style.justifyContent = "space-evenly"; 
    }
    

    document.getElementById("insert-img-btn").addEventListener("click", function() {
        document.getElementById("hidden-file-input").click();
        const file = this.files[0];
    
        if (file) {
            // Subir el archivo y guardar su dirección en la base de datos
            uploadImage(file);
        }
    });
    
    document.getElementById("delete-img-btn").addEventListener("click", function() {
        // Aquí va el código para eliminar la imagen
    });
    
    document.getElementById("close-btn").addEventListener("click", function(event) {
        event.stopPropagation(); // Detener la propagación del evento para evitar que se muestren de nuevo los botones
        document.getElementById("profile-buttons").style.display = "none";
    });
    

    
}



