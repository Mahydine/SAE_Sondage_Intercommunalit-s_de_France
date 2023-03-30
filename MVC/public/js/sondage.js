cpt = 0;
var textNbAlimentsChoisi = document.querySelector("#sectionAlimentChoisiSondage h3 span");

function alimentExisteDeja(alimentId) {
    const inputs = document.querySelectorAll("#liste-aliments input");
    for (const input of inputs) {
        if (input.value === alimentId) {
            return true;
        }
    }
    return false;
}

function ajouterAliment(select) {
    const alimentId = select.value;
    const alimentNom = select.options[select.selectedIndex].text;
    const listeAliments = document.getElementById("liste-aliments");
    if (cpt < 10) {
        if (!alimentExisteDeja(alimentId)) {
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "aliments[]";
            input.value = alimentId;

            const button = document.createElement("button");
            button.type = "button";
            button.textContent = "Supprimer";
            button.onclick = function () {
                supprimerAliment(button);
            };

            const li = document.createElement("li");
            li.textContent = alimentNom + ' ';
            li.appendChild(button);
            li.appendChild(input);
            listeAliments.appendChild(li);
            cpt++;
            textNbAlimentsChoisi.textContent = cpt;
        } else
            alert("Cet aliment a déjà été ajouté à la liste.");
    } else
        alert("10 aliments maximums peuvent êtres ajouté à la liste.");

    select.selectedIndex = 0;
}

function supprimerAliment(button) {
    const li = button.parentElement;
    li.remove();
    cpt--;
    textNbAlimentsChoisi.textContent = cpt;
}

function afficherNbAlimentsChoisi() {
    return cpt;
}
