
window.open_mobile_menu = function($var) {
    const menu = document.getElementById($var);
    const btn = document.getElementById('btn-menu');

    if(menu.classList.contains("show-menu")) {
        menu.classList.remove("show-menu");
        menu.classList.add("close-menu");
        //document.body.style.overflow = '';
    }else if(menu.classList.contains("close-menu")) {
        menu.classList.remove("close-menu");
        menu.classList.add("show-menu");
        //document.body.style.overflow = 'hidden';
    }

    if(btn.classList.contains("btn-close")) {
        btn.classList.remove("btn-close");

    } else {
        btn.classList.add("btn-close");
    }

    menu.addEventListener("click", (e) => {
        if(e.target.id == 'btn-menu') {
            
            btn.classList.remove("btn-close");
            menu.classList.remove('show-menu');
            menu.classList.add('close-menu');
            //document.body.style.overflow = '';
        }
    })

}

window.open_dropdown = function($element, $show) {
    const dropdown = document.getElementById($element);

    dropdown.classList.toggle($show)
}


window.open_cart = function($element, $show) {
    const cart = document.getElementById($element);

    cart.classList.toggle($show)

    cart.addEventListener("click", (e) => {
        if(e.target.id == 'close-cart' || e.target.id == 'cart-bg') {
            
            cart.classList.remove($show)
        }
    })
}

window.checkbox_active = function($element) {
    const div_checkbox = document.getElementById($element);

    div_checkbox.classList.remove('div-checkbox')
    div_checkbox.classList.add('div-checkbox-checked')
}