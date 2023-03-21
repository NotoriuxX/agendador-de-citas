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
function toggleDropdown(event) {
    event.stopPropagation();
    var dropdown = document.getElementById("dropdown");
    var button = event.currentTarget;
    var buttonRect = button.getBoundingClientRect();
    
    dropdown.style.left = buttonRect.left + "px";
    dropdown.style.top = buttonRect.bottom + "px";
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  }
  
  
  document.addEventListener("click", function() {
    var dropdown = document.getElementById("dropdown");
    dropdown.style.display = "none";
  });
  



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
/*--------------------listView-------------------------*/
if (window.location.pathname.endsWith('inicio.php')) {


    function applyListView() {
        // Remueve la clase "active" del botón de "Grid View"
        document.getElementById("gridViewBtn").classList.remove("active");
      
        // Agrega la clase "active" al botón de "List View"
        document.getElementById("listViewBtn").classList.add("active");
      
        // Agrega la clase "active" a los elementos relevantes
        const elements = document.querySelectorAll(".project-box-wrapper, .project-boxes.jsGridView, .project-box, .project-box-header, .more-wrapper, .project-box-content-header, .box-content-header, .box-content-subheader, .project-box-footer, .box-progress-wrapper");
        elements.forEach(element => {
          element.classList.add("active");
        });
      }
      
      function applyGridView() {
        // Remueve la clase "active" del botón de "List View"
        document.getElementById("listViewBtn").classList.remove("active");
      
        // Agrega la clase "active" al botón de "Grid View"
        document.getElementById("gridViewBtn").classList.add("active");
      
        // Remueve la clase "active" de los elementos relevantes
        const elements = document.querySelectorAll(".project-box-wrapper, .project-boxes.jsGridView, .project-box, .project-box-header, .more-wrapper, .project-box-content-header, .box-content-header, .box-content-subheader, .project-box-footer, .box-progress-wrapper");
        elements.forEach(element => {
          element.classList.remove("active");
        });
      }
      
      document.getElementById("listViewBtn").addEventListener("click", function() {
        applyListView();
        localStorage.setItem("view", "list");
      });
      
      document.getElementById("gridViewBtn").addEventListener("click", function() {
        applyGridView();
        localStorage.setItem("view", "grid");
      });
      
      // Cargar la selección guardada al cargar la página
      document.addEventListener("DOMContentLoaded", function() {
        const savedView = localStorage.getItem("view");
        if (savedView === "list") {
          applyListView();
        } else if (savedView === "grid") {
          applyGridView();
        }
      });
      


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
        localStorage.setItem('activeForm', 'carta_presentacion');
      } else {
        formulario1.classList.add('is-active');
        formulario1.style.display = 'block';
        formulario2.style.display = 'none';
        perfilBtn.classList.add('is-active');
        cartaPresentacionBtn.classList.remove('is-active');
        localStorage.setItem('activeForm', 'perfil');
      }
    }
    
    function restoreFormVisibility() {
      const activeForm = localStorage.getItem('activeForm');
      if (activeForm === 'carta_presentacion') {
        toggleFormVisibility();
      }
    }
    
    document.addEventListener('DOMContentLoaded', restoreFormVisibility);
    

  perfilBtn.addEventListener('click', toggleFormVisibility);
  cartaPresentacionBtn.addEventListener('click', toggleFormVisibility);



    function redirige() {
        const profileButtons = document.getElementById("profile-buttons");
        profileButtons.style.display = "flex"; 
        profileButtons.style.justifyContent = "space-evenly"; 
    }
    

    document.getElementById("insert-img-btn").addEventListener("click", function () {
        const hiddenFileInput = document.getElementById("hidden-file-input");
        hiddenFileInput.click();
    
        hiddenFileInput.addEventListener("change", function () {
            const file = this.files[0];
    
            if (file) {
                const formData = new FormData();
                formData.append('imagen_perfil', file);
                formData.append('user_id', userId);
    
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'Verificacion/upload_image.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
    
                        if (response.status === 'success') {
                            const imgProfile = document.querySelector('.img_profile');
                            imgProfile.src = 'img/' + response.file_name;
                            location.reload(); // Agrega esta línea para recargar la página
                        } else {
                            // Muestra el mensaje de error
                            alert(response.message);
                        }
                    }
                };
    
                xhr.send(formData);
            }
        });
    });
    
    
    
    document.getElementById("delete-img-btn").addEventListener("click", function () {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Verificacion/delete_image.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
    
                if (response.status === "success") {
                    const imgProfile = document.querySelector(".img_profile");
                    imgProfile.src = "img/user.jpg";
                    location.reload(); // Agrega esta línea para recargar la página
                } else {
                    alert(response.message);
                }
            }
        };
    
        xhr.send(`user_id=${userId}`);
    });
    


    
    document.getElementById("close-btn").addEventListener("click", function(event) {
        event.stopPropagation(); // Detener la propagación del evento para evitar que se muestren de nuevo los botones
        document.getElementById("profile-buttons").style.display = "none";
    });
    

// -------------------visible ocultar-------------------
function updateVisibilityStatus() {
    const isChecked = document.getElementById("visibilityToggle").checked;
    const visibilityStatus = isChecked ? "visible" : "ocultar";

    // Reemplaza la URL con la dirección de tu archivo PHP para procesar la actualización de la visibilidad
    const updateUrl = "Verificacion/update_visibility.php";

    fetch(updateUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ visibility: visibilityStatus }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            console.log("Visibilidad actualizada:", visibilityStatus);
        } else {
            console.error("Error al actualizar la visibilidad:", data.message);
        }
    })
    .catch((error) => {
        console.error("Error al actualizar la visibilidad:", error);
    });
}

document.getElementById("visibilityToggle").addEventListener("change", updateVisibilityStatus);

    


//-------------------------------------ALERTAS----------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const alertMessage = document.getElementById('alert-message');

    if (alertMessage) {
        setTimeout(function() {
            alertMessage.remove();
        }, 3000);
    }
});



//--------------verifica que se modifico el formulario-----------------------------

document.addEventListener('DOMContentLoaded', function() {
    const form1 = document.querySelector('.formulario_1');
    const form2 = document.getElementById('perfilForm');
    const forms = [form1, form2];

    const updateButton1 = document.getElementById('update-button');
    const updateButton2 = document.getElementById('update-button-2');
    const updateButtons = [updateButton1, updateButton2];

    forms.forEach((form, index) => {
        const inputs = form.querySelectorAll('input');
        let isFormModified = false;

        function checkFormChanges() {
            for (const input of inputs) {
                if (input.value !== input.defaultValue) {
                    isFormModified = true;
                    break;
                } else {
                    isFormModified = false;
                }
            }
            updateButtons[index].disabled = !isFormModified;
        }

        for (const input of inputs) {
            input.addEventListener('input', checkFormChanges);
        }

        window.addEventListener('beforeunload', function(event) {
            if (isFormModified) {
                event.preventDefault();
                event.returnValue = '¿Seguro que quieres salir sin guardar los cambios?';
            }
        });
    });
});

}
if (window.location.pathname.endsWith('agendar_citas.php')) {
   

    document.addEventListener('DOMContentLoaded', function() {
        // Verifica si los elementos existen antes de agregar los controladores de eventos
        const dateFrom = document.getElementById('date-from');
        const dateTo = document.getElementById('date-to');
        const generalizadoRadio = document.querySelector('input[name="option"][value="generalizado"]');
        const personalizadoRadio = document.querySelector('input[name="option"][value="personalizado"]');
        const agregarDias = document.getElementById('agregar-dias');
        const eliminarDias = document.getElementById('eliminar-dias');
    
        if (dateFrom && dateTo) {
            dateFrom.addEventListener('input', updateCustomDates);
            dateTo.addEventListener('input', updateCustomDates);
        }
    
        if (generalizadoRadio && personalizadoRadio) {
            generalizadoRadio.addEventListener('change', () => showOptions('generalizado'));
            personalizadoRadio.addEventListener('change', () => showOptions('personalizado'));
    
            // Agrega el controlador de eventos onclick en lugar de usar el atributo HTML onclick
            document.querySelectorAll('input[type="radio"][name="option"]').forEach(function(radio) {
                radio.addEventListener('click', function() {
                    showOptions(this.value);
                });
            });
        }
    
        if (agregarDias && eliminarDias) {
            agregarDias.addEventListener('change', togglePersonalizado);
            eliminarDias.addEventListener('change', togglePersonalizado);
        }
    });
    
    
    function updateCustomDates() {
        const dateFrom = document.getElementById('date-from').value;
        const dateTo = document.getElementById('date-to').value;
    
        if (dateFrom && dateTo) {
            document.querySelector('.option').style.display = 'block';
        } else {
            document.querySelector('.option').style.display = 'none';
        }
    }
    
    function showOptions(option) {
        const generalizado = document.querySelector('.generalizado');
        const personalizado = document.querySelector('.personalizado');
    
        if (option === 'generalizado' && personalizado.style.display === 'block') {
            if (hasSelectedOptions('personalizado') && !confirm('¿Seguro que quieres salir? Se borrarán los datos que ingresó en los días personalizados.')) {
                return;
            }
            clearPersonalizedDates();
            clearWeekdaySelection('personalizado');
        }
    
        if (option === 'generalizado') {
        generalizado.style.display = 'block';
        personalizado.style.display = 'none';
    } else if (option === 'personalizado') {
        if (hasSelectedOptions('generalizado') && !confirm('¿Seguro que quieres salir? Se borrarán los datos que ingresó en los días predefinidos.')) {
            return;
        }
        generalizado.style.display = 'none';
        personalizado.style.display = 'block';
        initFlatpickr();
        clearWeekdaySelection('generalizado');
    }
}
function hasSelectedOptions(option) {
    const checkboxContainer = document.getElementById(`dias-semana-${option}`);
    const checkboxes = checkboxContainer.querySelectorAll('input[type="checkbox"]');
    const hasCheckedWeekday = Array.from(checkboxes).some(checkbox => checkbox.checked);

    if (option === 'personalizado') {
        const agregarDias = document.getElementById('agregar-dias');
        const eliminarDias = document.getElementById('eliminar-dias');
        const diasPersonalizadosAgregar = document.getElementById('dias-personalizados-agregar');
        const diasPersonalizadosEliminar = document.getElementById('dias-personalizados-eliminar');

        const hasSelectedCustomDate = (agregarDias.checked && diasPersonalizadosAgregar.value !== '') || (eliminarDias.checked && diasPersonalizadosEliminar.value !== '');

        return hasCheckedWeekday || hasSelectedCustomDate;
    }

    return hasCheckedWeekday;
}
    function clearPersonalizedDates() {
        const diasPersonalizadosAgregar = document.getElementById('dias-personalizados-agregar');
        const diasPersonalizadosEliminar = document.getElementById('dias-personalizados-eliminar');
    
        diasPersonalizadosAgregar.value = '';
        diasPersonalizadosEliminar.value = '';
    }
    
    function togglePersonalizado() {
        const agregarDias = document.getElementById('agregar-dias');
        const eliminarDias = document.getElementById('eliminar-dias');
        const diasPersonalizadosAgregar = document.getElementById('dias-personalizados-agregar');
        const diasPersonalizadosEliminar = document.getElementById('dias-personalizados-eliminar');
    
        if (agregarDias.checked) {
            diasPersonalizadosAgregar.style.display = 'block';
        } else {
            diasPersonalizadosAgregar.style.display = 'none';
        }
    
        if (eliminarDias.checked) {
            diasPersonalizadosEliminar.style.display = 'block';
        } else {
            diasPersonalizadosEliminar.style.display = 'none';
        }
    }
    function clearWeekdaySelection(option) {
        const checkboxContainer = document.getElementById(`dias-semana-${option}`);
        const checkboxes = checkboxContainer.querySelectorAll('input[type="checkbox"]');
    
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }
    
    function initFlatpickr() {
        const dateFrom = new Date(document.getElementById('date-from').value);
        const dateTo = new Date(document.getElementById('date-to').value);
    
        if (dateFrom && dateTo && dateFrom <= dateTo) {
            flatpickr('#dias-personalizados-agregar', {
                mode: 'multiple',
                dateFormat: 'Y-m-d',
                minDate: dateFrom,
                maxDate: dateTo,
                locale: {
                    firstDayOfWeek: 1 // Lunes como primer día de la semana
                }
            });
            flatpickr('#dias-personalizados-eliminar', {
                mode: 'multiple',
                dateFormat: 'Y-m-d',
                minDate: dateFrom,
                maxDate: dateTo,
                locale: {
                    firstDayOfWeek: 1 // Lunes como primer día de la semana
                }
            });
        }
    }
    
    


}//final del if



  const toggleLink = document.getElementById("toggle-link");
  const headerRight = document.querySelector(".app-sidebar");

  toggleLink.addEventListener("click", function(e) {
    e.preventDefault();
    headerRight.classList.toggle("none");
  });
