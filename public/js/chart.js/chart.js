

$(document).ready(function(){
  alert("test");
  $.ajax({
    url: "/newchart",
    method: "GET",
    success: function(data) {
      alert(data)
			console.log(data);
       var ward = [];
       var count = [];

       for(var i in data) {
         ward.push("ward" + data[i].ward_no);
         count.push(data[i].wards);
       }

      var chartdata = {
        //console.log(w);
        labels: ward,
        datasets : [
          {
            label: 'wards count',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: count
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
