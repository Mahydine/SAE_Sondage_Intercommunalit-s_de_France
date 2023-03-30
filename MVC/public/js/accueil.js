
//recuperation des gaphiques
const graph1 = document.getElementById('graphique1');
const graph2 = document.getElementById('graphique2');
const graph3 = document.getElementById('graphique3');

//graph1
//recupere les labels d'un graphique envoyee en php
const data_labels_graph1 = Object.keys(data_consommation_age_categories);
//recupere les labels datasets d'un graphique envoyee en php
datasets_labels_graph1 = Object.keys(data_consommation_age_categories[data_labels_graph1[0]]);

//graph2
const data_labels_graph2 = Object.keys(data_moyenne_nutiments_principales);
const data_graph2 = Object.values(data_moyenne_nutiments_principales);

// //graph3 
const data_labels_graph3 = Object.keys(data_moyenne_nutriments_secondaires);
const data_graph3 =  Object.values(data_moyenne_nutriments_secondaires);

document.addEventListener('DOMContentLoaded', () => {
  const menuBurger = document.querySelector('.menu-burger');
  const rightPart = document.querySelector('.right-part');

  menuBurger.addEventListener('click', () => {
    rightPart.classList.toggle('navbar-open');
    menuBurger.classList.toggle('navbar-open');
  });
});

function getDataDaughnut(data_labels, data, label){
  return data = {
    labels: data_labels,
    datasets: [{
      label: label,
      data: data,
      hoverOffset: 4
    }]
  };

}

//datasets_label correspond aux labels a mettre dans les datasets
//data_labels correspond au labels a mettre dans les data
//all_data correspond aux donnees
function getDataBar(datasets_labels, data_labels, all_data){
    var datasets =[];
    datasets_labels.forEach(element => {
        let data = [];
        data_labels.forEach(label => {
            data.push(all_data[label][element]);
        });
        datasets.push({
            label : element,
            data : data,
            borderWidth: 1,
            hoverOffset: 4

        })
    });

    var data = {
      labels: data_labels,
      datasets: datasets
    }
    return data;
}

new Chart(graph1, {
    type: 'bar',
    data: getDataBar(datasets_labels_graph1,data_labels_graph1,data_consommation_age_categories),
});

new Chart(graph2, {
  type: 'pie',
  data : getDataDaughnut(data_labels_graph2, data_graph2, "Moyenne")
})

new Chart(graph3, {
  type: 'pie',
  data : getDataDaughnut(data_labels_graph3, data_graph3, "Moyenne")
})

const villeSelect = document.getElementById('ville-select');
const top3AlimentsParVille = document.getElementById('top3-aliments-par-ville');
