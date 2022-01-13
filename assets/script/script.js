let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
date = date.toUTCString();

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

if (document.getElementById("darkMode") != null) {
    if (document.getElementById("cardNews").children[0].checked) {
        document.getElementById("cardNews").children[1].classList.add("text-danger")
        document.getElementById("cardNews").children[1].classList.add("fw-bold")
        document.getElementById("cardNews").classList.replace("border-white", "border-danger")
        document.getElementById("cardNews").classList.replace("border-dark", "border-danger")
    }

    if (document.getElementById("cardTests").children[0].checked) {
        document.getElementById("cardTests").children[1].classList.add("text-danger")
        document.getElementById("cardTests").children[1].classList.add("fw-bold")
        document.getElementById("cardTests").classList.replace("border-white", "border-danger")
        document.getElementById("cardTests").classList.replace("border-dark", "border-danger")
    }

    if (document.getElementById("cardMulti").children[0].checked) {
        document.getElementById("cardMulti").children[1].classList.add("text-danger")
        document.getElementById("cardMulti").children[1].classList.add("fw-bold")
        document.getElementById("cardMulti").classList.replace("border-white", "border-danger")
        document.getElementById("cardMulti").classList.replace("border-dark", "border-danger")
    }

    if (document.getElementById("cardAndroid").children[0].checked) {
        document.getElementById("cardAndroid").children[1].classList.add("text-danger")
        document.getElementById("cardAndroid").children[1].classList.add("fw-bold")
        document.getElementById("cardAndroid").classList.replace("border-white", "border-danger")
        document.getElementById("cardAndroid").classList.replace("border-dark", "border-danger")
    }

    if (document.getElementById("cardPC").children[0].checked) {
        document.getElementById("cardPC").children[1].classList.add("text-danger")
        document.getElementById("cardPC").children[1].classList.add("fw-bold")
        document.getElementById("cardPC").classList.replace("border-white", "border-danger")
        document.getElementById("cardPC").classList.replace("border-dark", "border-danger")
    }

    document.getElementById("cardNews").addEventListener("click", (e) => {
        if (e.target.children[0].checked) {
            e.target.children[0].checked = false
            e.target.children[1].classList.remove("text-danger")
            e.target.children[1].classList.remove("fw-bold")
            if (document.cookie.includes("mode=dark")) {
                e.target.classList.replace("border-danger", "border-white")
            } else {
                e.target.classList.replace("border-danger", "border-dark")
            }
        } else {
            e.target.children[0].checked = true
            e.target.children[1].classList.add("text-danger")
            e.target.children[1].classList.add("fw-bold")
            e.target.classList.replace("border-white", "border-danger")
            e.target.classList.replace("border-dark", "border-danger")
        }

    })

    document.getElementById("cardTests").addEventListener("click", (e) => {
        if (e.target.children[0].checked) {
            e.target.children[0].checked = false
            e.target.children[1].classList.remove("text-danger")
            e.target.children[1].classList.remove("fw-bold")
            if (document.cookie.includes("mode=dark")) {
                e.target.classList.replace("border-danger", "border-white")
            } else {
                e.target.classList.replace("border-danger", "border-dark")
            }
        } else {
            e.target.children[0].checked = true
            e.target.children[1].classList.add("text-danger")
            e.target.children[1].classList.add("fw-bold")
            e.target.classList.replace("border-white", "border-danger")
            e.target.classList.replace("border-dark", "border-danger")
        }

    })

    document.getElementById("cardMulti").addEventListener("click", (e) => {
        if (e.target.children[0].checked) {
            e.target.children[0].checked = false
            e.target.children[1].classList.remove("text-danger")
            e.target.children[1].classList.remove("fw-bold")
            if (document.cookie.includes("mode=dark")) {
                e.target.classList.replace("border-danger", "border-white")
            } else {
                e.target.classList.replace("border-danger", "border-dark")
            }
        } else {
            e.target.children[0].checked = true
            e.target.children[1].classList.add("text-danger")
            e.target.children[1].classList.add("fw-bold")
            e.target.classList.replace("border-white", "border-danger")
            e.target.classList.replace("border-dark", "border-danger")
        }

    })

    document.getElementById("cardAndroid").addEventListener("click", (e) => {
        if (e.target.children[0].checked) {
            e.target.children[0].checked = false
            e.target.children[1].classList.remove("text-danger")
            e.target.children[1].classList.remove("fw-bold")
            if (document.cookie.includes("mode=dark")) {
                e.target.classList.replace("border-danger", "border-white")
            } else {
                e.target.classList.replace("border-danger", "border-dark")
            }
        } else {
            e.target.children[0].checked = true
            e.target.children[1].classList.add("text-danger")
            e.target.children[1].classList.add("fw-bold")
            e.target.classList.replace("border-white", "border-danger")
            e.target.classList.replace("border-dark", "border-danger")
        }

    })

    document.getElementById("cardPC").addEventListener("click", (e) => {
        if (e.target.children[0].checked) {
            e.target.children[0].checked = false
            e.target.children[1].classList.remove("text-danger")
            e.target.children[1].classList.remove("fw-bold")
            if (document.cookie.includes("mode=dark")) {
                e.target.classList.replace("border-danger", "border-white")
            } else {
                e.target.classList.replace("border-danger", "border-dark")
            }
        } else {
            e.target.children[0].checked = true
            e.target.children[1].classList.add("text-danger")
            e.target.children[1].classList.add("fw-bold")
            e.target.classList.replace("border-white", "border-danger")
            e.target.classList.replace("border-dark", "border-danger")
        }

    })
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
    console.log(arrayCards)
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
            document.getElementById("cardNews").classList.replace("bg-white", "bg-dark")
            document.getElementById("cardTests").classList.replace("bg-white", "bg-dark")
            document.getElementById("cardMulti").classList.replace("bg-white", "bg-dark")
            document.getElementById("cardAndroid").classList.replace("bg-white", "bg-dark")
            document.getElementById("cardPC").classList.replace("bg-white", "bg-dark")
            document.getElementById("cardNews").classList.replace("border-dark", "border-white")
            document.getElementById("cardTests").classList.replace("border-dark", "border-white")
            document.getElementById("cardMulti").classList.replace("border-dark", "border-white")
            document.getElementById("cardAndroid").classList.replace("border-dark", "border-white")
            document.getElementById("cardPC").classList.replace("border-dark", "border-white")
            document.body.classList.add("darkBackColor")
            document.cookie = 'mode=dark; path=/; expires=' + date;
        } else {
            document.body.classList.remove("darkBackColor")
            document.getElementById("cardNews").classList.replace("bg-dark", "bg-white")
            document.getElementById("cardTests").classList.replace("bg-dark", "bg-white")
            document.getElementById("cardMulti").classList.replace("bg-dark", "bg-white")
            document.getElementById("cardAndroid").classList.replace("bg-dark", "bg-white")
            document.getElementById("cardPC").classList.replace("bg-dark", "bg-white")
            document.getElementById("cardNews").classList.replace("border-white", "border-dark")
            document.getElementById("cardTests").classList.replace("border-white", "border-dark")
            document.getElementById("cardMulti").classList.replace("border-white", "border-dark")
            document.getElementById("cardAndroid").classList.replace("border-white", "border-dark")
            document.getElementById("cardPC").classList.replace("border-white", "border-dark")
            document.cookie = 'mode=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        }
    })
}