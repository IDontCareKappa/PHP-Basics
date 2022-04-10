//Fetch API
document.addEventListener('DOMContentLoaded', () => {
    var bonas = document.getElementById('onas');
    bonas.addEventListener("click", () => {
        console.log("Strona O nas");
        pokazStrone("onas.php");
    });

    var bgaleria = document.getElementById('galeria');
    bgaleria.addEventListener("click", () => {
        console.log("Galeria zdjęć");
        pokazStrone("galeria.php");
    });

    var bglowna = document.getElementById('index');
    bglowna.addEventListener("click", () => {
        console.log("Stona Glowna");
        pokazStrone("glowna.php");
    });

    var bformularz = document.getElementById('formularz');
    bformularz.addEventListener("click", () => {
        console.log("Formularz");
        pokazStrone("formularz.php");
    });
});

function pokazStrone(strona) {
    fetch("http://localhost/Lab_11/skrypty/" + strona)
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}