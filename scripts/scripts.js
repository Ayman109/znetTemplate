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


        if (window.scrollY > 50) {
            header.classList.add("site-header-scroll");
            //toTop.classList.add("toTopActive")

        } else{
            header.classList.remove("site-header-scroll");
            //toTop.classList.remove("toTopActive") ; 
        }
 
        
    });