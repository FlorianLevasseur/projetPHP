let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
date = date.toUTCString();

if (document.getElementById("infoModal") != null) {
    infoModal.addEventListener('click', (e) => {
        if (e.target.nodeName == "BUTTON") {
            descriptionModal.textContent = e.target.dataset.description;
            imgModal.src = e.target.dataset.img;
            linkModal.href = e.target.dataset.link;
            titleModal.innerHTML = e.target.dataset.time + "<br>" + e.target.dataset.title;
        }
    })
}


if (document.cookie.includes("mode=dark")) {
    document.body.classList.add("darkBackColor")
    if (document.getElementById("infoModal") != null) {
        document.getElementById("infoModal").classList.add("text-white")
        document.getElementById("myTable").classList.replace("border-dark","border-white")
    }
    if (document.getElementById("myNavbar") != null) {
        document.getElementById("myNavbar").classList.replace("navbar-light", "navbar-dark")
        document.getElementById("myNavbar").classList.replace("bg-light", "bg-dark")
    }
    if (document.getElementById("darkMode") != null) {
        document.getElementById("darkMode").checked = true
    }
    let arrayCards = document.getElementsByClassName("card")
    for(let item of arrayCards){
        item.classList.add("bg-dark")
        item.classList.replace("border-dark", "border-white")
    }
}

if (document.getElementById("darkMode") != null) {
    document.getElementById("darkMode").addEventListener("click", () => {
        if (!document.body.classList.contains("darkBackColor")) {
            document.body.classList.add("darkBackColor")
            document.cookie = 'mode=dark; path=/; expires=' + date;
        } else {
            document.body.classList.remove("darkBackColor")
            document.cookie = 'mode=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        }
    })
}