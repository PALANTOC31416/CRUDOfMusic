document.addEventListener('DOMContentLoaded', () => {
    let contendMenu = document.querySelector('.contendMenu');
    let formMusica = document.querySelector('.add-music');
    let formGenero = document.querySelector('.add-genres');

    contendMenu.addEventListener('click', (e) => {
        e.preventDefault();
        try {
            if (e.target.classList[2] == "registerMusic") {
                formMusica.style.display = 'block'
                formGenero.style.display = 'none'
            }
        } catch (e) {

        }

        try {
            if (e.target.classList[1] == "registerGenres") {
                formGenero.style.display = 'block'
                formMusica.style.display = 'none'
            }
        } catch (e) {

        }
    });
});