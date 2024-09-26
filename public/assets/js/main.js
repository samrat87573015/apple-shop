function successTost(msg) {
    Toastify({
        text: msg,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },

    }).showToast();
}

function errorTost(msg) {
    Toastify({
        text: msg,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #f12711, #f5af19)",
        },

    }).showToast();
}


function showAjaxPreloader() {
    let ajaxPreloder = document.getElementById('ajaxPreloder');
    ajaxPreloder.style.display = "block";
}

function hideAjaxPreloader() {
    let ajaxPreloder = document.getElementById('ajaxPreloder');
    ajaxPreloder.style.display = "none";
}
