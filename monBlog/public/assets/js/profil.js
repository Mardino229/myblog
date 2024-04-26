const img = document.getElementById('profil');
const input = document.getElementById("photo");

input.addEventListener("change", ()=>{
    img.src = URL.createObjectURL(input.files[0]);
});