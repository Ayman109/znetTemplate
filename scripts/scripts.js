    document.getElementById('hamburger').addEventListener('click', function() {
        var mobile_menu = document.querySelector('.mobile-menu');
        if(mobile_menu.classList.contains("active"))
        {
            mobile_menu.classList.remove("active")
            mobile_menu.classList.add("close")
        }
        else   {
            mobile_menu.classList.add("active")
            mobile_menu.classList.remove("close")

        }
    });

    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        var toTop  = document.querySelector(".toTop");
        var logo = this.document.querySelector(".logo img")


        if (window.scrollY > 50) {
            header.classList.add("site-header-scroll");
            document.body.classList.add("scrolled");


        } else{
            header.classList.remove("site-header-scroll");
            document.body.classList.remove("scrolled");
        }
 
        
    });