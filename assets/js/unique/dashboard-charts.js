$.ajax({
  url: window.location.href + '/send_visitor_data',
  method: 'GET',
  success: function(data) {
    const monthName = data.month;
    const monthVisitor = data.visitor;
    const author = data.author;
    const postsCount = data.post_count;
    const category = data.category;
    const catCount = data.cat_count;
    const catColor = data.cat_color;

    // console.log(category);
    // console.log(catCount);
    // console.log(catColor);

    
    // Visitor Chart
    var ctx1 = document.getElementById("visitorChart");
    var visitorChart = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: monthName,
        datasets: [{
          label: "Visitor",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: monthVisitor,
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 6,
              padding: 10
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10
        }
      }
    });

    // Category Chart
    var ctx2 = document.getElementById("categoryChart");
    var cateogryChart = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: category,
        datasets: [{
          data: catCount,
          backgroundColor: catColor,
          weight: 10
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 50,
      },
      
    });

    // Top Author Chart
    var ctx3 = document.getElementById("postAuthorChart");
    var postAuthorChart = new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: author,
        datasets: [{
          label: "Posts ",
          backgroundColor: '#17B675',
          hoverBackgroundColor: '#16A675',
          data: postsCount
        }]
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'post'
            },
            gridLines: {
              display: false,
              drawborder: false
            },
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 50,
              maxTicksLimit: 6
            }
          }]
        }
      }
    })
  
    
  }
});