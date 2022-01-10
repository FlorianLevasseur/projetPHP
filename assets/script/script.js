let date = new Date(Date.now() + 86400000); //86400000ms = 1 jour
date = date.toUTCString();

if(document.cookie.includes("mode=dark")) {
    document.body.classList.add("darkBackColor")
    document.getElementById("darkMode").checked = true
}

document.getElementById("darkMode").addEventListener("click", () => {
    if(!document.body.classList.contains("darkBackColor")){
        document.body.classList.add("darkBackColor")
        document.cookie = 'mode=dark; path=/; expires=' + date;
    } else {
        document.body.classList.remove("darkBackColor")
        document.cookie = 'mode=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
    }
})