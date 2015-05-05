
//   function pieChart() {
//     var data = google.visualization.arrayToDataTable([
//         ['Task', 'Hours per Day'],
//         [ 'Adult',     25],
//         [ 'Minor',      25],
//         [ 'Labor',  50]
//       ]);

//     var options = {
//         title: 'Type of Trafficking'
//     };

//     var chart = new google.visualization.PieChart(document.getElementById('chart'));
//     chart.draw(data, options);
//   }
//   function barGraph() {
//         var data = google.visualization.arrayToDataTable([
//           ['Case', 'White', 'Black', 'Hispanic', 'Asian', 'Other'],
//           ['Case 1',  4,      6,     3,        4,      2],
//           ['Case 2',  5,      5,     5,        7,      3]
//         ]);

//         var options = {
//           title: 'Defendants By Ethnicity',
//           vAxis: {title: 'Number of Defendants',  titleTextStyle: {color: 'red'}}
//         };

//         var chart = new google.visualization.BarChart(document.getElementById('chart'));

//         chart.draw(data, options);
//       }
//   function histogram() {
//         var data = google.visualization.arrayToDataTable([
//           ['Dinosaur', 'Length'],
//           ['Acrocanthosaurus (top-spined lizard)', 12.2],
//           ['Albertosaurus (Alberta lizard)', 9.1],
//           ['Allosaurus (other lizard)', 12.2],
//           ['Apatosaurus (deceptive lizard)', 22.9],
//           ['Archaeopteryx (ancient wing)', 0.9],
//           ['Argentinosaurus (Argentina lizard)', 36.6],
//           ['Baryonyx (heavy claws)', 9.1],
//           ['Brachiosaurus (arm lizard)', 30.5],
//           ['Ceratosaurus (horned lizard)', 6.1],
//           ['Coelophysis (hollow form)', 2.7],
//           ['Compsognathus (elegant jaw)', 0.9],
//           ['Deinonychus (terrible claw)', 2.7],
//           ['Diplodocus (double beam)', 27.1],
//           ['Dromicelomimus (emu mimic)', 3.4],
//           ['Gallimimus (fowl mimic)', 5.5],
//           ['Mamenchisaurus (Mamenchi lizard)', 21.0],
//           ['Megalosaurus (big lizard)', 7.9],
//           ['Microvenator (small hunter)', 1.2],
//           ['Ornithomimus (bird mimic)', 4.6],
//           ['Oviraptor (egg robber)', 1.5],
//           ['Plateosaurus (flat lizard)', 7.9],
//           ['Sauronithoides (narrow-clawed lizard)', 2.0],
//           ['Seismosaurus (tremor lizard)', 45.7],
//           ['Spinosaurus (spiny lizard)', 12.2],
//           ['Supersaurus (super lizard)', 30.5],
//           ['Tyrannosaurus (tyrant lizard)', 15.2],
//           ['Ultrasaurus (ultra lizard)', 30.5],
//           ['Velociraptor (swift robber)', 1.8]]);

//         var options = {
//           title: 'Lengths of dinosaurs, in meters',
//           legend: { position: 'none' },
//         };

//         var chart = new google.visualization.Histogram(document.getElementById('chart'));
//         chart.draw(data, options);
//       }
//   function lineGraph() {
//         var data = google.visualization.arrayToDataTable([
//           ['Year', 'Sales', 'Expenses'],
//           ['2004',  1000,      400],
//           ['2005',  1170,      460],
//           ['2006',  660,       1120],
//           ['2007',  1030,      540]
//         ]);

//         var options = {
//           title: 'Company Performance',
//           curveType: 'function',
//           legend: { position: 'bottom' }
//         };

//         var chart = new google.visualization.LineChart(document.getElementById('chart'));

//         chart.draw(data, options);
//       }
//   function geoChart() {
//         var data = google.visualization.arrayToDataTable([
//           ['State',   '# of Cases'],
//           ['Texas', 14],
//           ['Tennessee', 12],
//           ['Florida', 8],
//           ['California', 7],
//           ['New York', 21],
//           ['Illinois', 9],
//           ['Alabama', 2],
//           ['Arizona', 11],
//         ]);
  
//         var options = {
//           region: 'US',
//           displayMode: 'markers',
//           colorAxis: {colors: ['green', 'blue']},
//           resolution: 'provinces'
//         };

//         var chart = new google.visualization.GeoChart(document.getElementById('chart'));
//         chart.draw(data, options);
//       };

//   function initialize () {
//     // $('#applyButton').click(function() {
//     //     if($('#lineGraphRadio').is(':checked')) {
//     //       lineGraph();
//     //     }
//     //     else if($('#barGraphRadio').is(':checked')){
//     //       barGraph();
//     //     }
//     //       else if($('#histogramRadio').is(':checked')){
//     //       histogram();
//     //     }
//     //       else if($('#pieChartRadio').is(':checked')){
//     //       pieChart();
//     //     }
//     //       else if($('#geoChartRadio').is(':checked')){
//     //       geoChart();
//     //     }
        
//     // });
//   }
// google.setOnLoadCallback(initialize);
// google.load("visualization", "1", {packages:["corechart"]});