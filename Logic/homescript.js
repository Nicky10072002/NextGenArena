const searchIcon = document.getElementById("search-icon");
const searchInput = document.getElementById("search-bar");
const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("navlinks")
searchIcon.addEventListener("click" , ()=>{
    searchInput.classList.toggle("show");
    if(searchInput.classList.contains("show")){
        searchInput.focus();
    }
});

hamburger.addEventListener("click", ()=>{
    navLinks.classList.toggle("show");
})