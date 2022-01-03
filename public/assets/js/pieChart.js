
 //pie chart
 var ctx = document.getElementById("pieChart");
 if (ctx) {
   ctx.height = 200;
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       datasets: [{
         data: [45, 25, 20, 10],
         backgroundColor: [
           "rgba(10, 123, 155,0.9)",
           "rgba(20, 123, 215,0.7)",
           "rgba(30, 123, 055,0.5)",
           "rgba(0,0,0,0.07)"
         ],
         hoverBackgroundColor: [
           "rgba(0, 123, 255,0.9)",
           "rgba(0, 123, 255,0.7)",
           "rgba(0, 123, 255,0.5)",
           "rgba(0,0,0,0.07)"
         ]
       }],
       labels: [
         "Diesel",
         "Essence",
         "Autre"
       ]
     },
     options: {
       legend: {
         position: 'top',
         labels: {
           fontFamily: 'Poppins'
         }

       },
       responsive: true
     }
    }
   )
};
