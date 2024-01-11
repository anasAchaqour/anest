const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});




//_________________________________ go to top button
document.addEventListener('DOMContentLoaded', function () {
    var scrollToTopElement = document.getElementById('scrollToTopElement');

    // Show or hide the button based on scroll position
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopElement.style.display = 'block';
        } else {
            scrollToTopElement.style.display = 'none';
        }
    };

    // Scroll to the top when the button is clicked
    scrollToTopElement.onclick = function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    };
});



/* spinner */
document.addEventListener('DOMContentLoaded', function () {
    // Show the overlay and spinner
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('loading-spinner').style.display = 'block';

    // Hide the loading spinner and overlay once the page is fully loaded
    setTimeout(function () {
        document.getElementById('overlay').style.opacity = '0';
        document.getElementById('loading-spinner').style.opacity = '0';

        setTimeout(function () {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('loading-spinner').style.display = 'none';

            // Show the page content
            document.getElementById('content').style.display = 'block';
        }, 500); // Add a delay to match the duration of the transition
    }, 500); // Adjust the delay in milliseconds
});
