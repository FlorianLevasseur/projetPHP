let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
date = date.toUTCString();
let arrayCard = document.getElementsByClassName("card")


// Script permettant d'afficher les informations d'un flux dans la MODAL (views/home.php)
if (document.getElementById("infoModal") != null) {
    infoModal.addEventListener('click', (e) => {
        if (e.target.nodeName == "I") {
            descriptionModal.textContent = e.target.dataset.description;
            imgModal.src = e.target.dataset.img;
            linkModal.href = e.target.dataset.link;
            titleModal.innerHTML = "<b><i>#" + e.target.dataset.flux + "</i></b><br><u>" + e.target.dataset.time + "</u><br>" + e.target.dataset.title;
        }
    })
}


// Script permettant de gérer le darkMode
if (document.getElementById("darkMode") != null) {
    for(let elt of arrayCard){
        if (elt.children[0].checked) {
            elt.children[1].classList.add("text-danger")
            elt.children[1].classList.add("fw-bold")
            elt.classList.replace("border-white", "border-danger")
            elt.classList.replace("border-dark", "border-danger")
        }

        elt.addEventListener("click", () => {
            if (elt.children[0].checked) {
                elt.children[0].checked = false
                elt.children[1].classList.remove("text-danger")
                elt.children[1].classList.remove("fw-bold")
                if (document.cookie.includes("mode=dark")) {
                    elt.classList.replace("border-danger", "border-white")
                } else {
                    elt.classList.replace("border-danger", "border-dark")
                }
            } else {
                elt.children[0].checked = true
                elt.children[1].classList.add("text-danger")
                elt.children[1].classList.add("fw-bold")
                elt.classList.replace("border-white", "border-danger")
                elt.classList.replace("border-dark", "border-danger")
            }
        })
    }
}

if (document.cookie.includes("mode=dark")) {
    document.body.classList.add("darkBackColor")
    if (document.getElementById("infoModal") != null) {
        document.getElementById("infoModal").classList.add("text-white")
        document.getElementById("myTable").classList.replace("border-dark", "border-white")
        document.getElementById("fullModal").classList.add("bg-dark")
        document.getElementById("titleModal").classList.replace("text-dark", "text-white")
        document.getElementById("descriptionModal").classList.replace("text-dark", "text-white")
    }
    if (document.getElementById("myNavbar") != null) {
        document.getElementById("myNavbar").classList.replace("navbar-light", "navbar-dark")
        document.getElementById("myNavbar").classList.replace("bg-light", "bg-dark")
    }
    if (document.getElementById("darkMode") != null) {
        document.getElementById("darkMode").checked = true
    }
    let arrayCards = document.getElementsByClassName("card")
    for (let item of arrayCards) {
        if(item.classList.contains("bg-white")){
            item.classList.replace("bg-white","bg-dark")
        } else {
            item.classList.add("bg-dark")
        }
        item.classList.replace("border-dark", "border-white")
    }
}

if (document.getElementById("darkMode") != null) {
    document.getElementById("darkMode").addEventListener("click", () => {
        if (!document.body.classList.contains("darkBackColor")) {
            for(let elt of arrayCard){
                elt.classList.replace("bg-white", "bg-dark")
                elt.classList.replace("border-dark", "border-white")
            }
            document.body.classList.add("darkBackColor")
            document.cookie = 'mode=dark; path=/; expires=' + date;
        } else {
            document.body.classList.remove("darkBackColor")
            for(let elt of arrayCard){
                elt.classList.replace("bg-dark", "bg-white")
                elt.classList.replace("border-white", "border-dark")
            }
            document.cookie = 'mode=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        }
    })
}