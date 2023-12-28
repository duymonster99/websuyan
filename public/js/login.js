const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });

    // Handle the password section when the user clicks on the eye icon
    // to toggle between showing the password as plain text or as a password field
    $(document).ready(function() {
        $('.icon_eye').click(function() {
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('bi-eye-slash-fill bi');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');
            }
        })
    })

    // When the user clicks on the sign up button, a popup dialog will appear to notify
    // the successful registration
    let popup = document.getElementById("popup");

    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
    }
