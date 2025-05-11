// chart donat
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('doughnutChart').getContext('2d');

    const data = {
        labels: chartData.labels,
        datasets: [{
            label: 'Distribusi Pasien',
            data: chartData.values, // Ganti dengan data dari PHP jika perlu
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        },
    };

    new Chart(ctx, config);
});

//chart garis
const ctxLine = document.getElementById("lineChart").getContext("2d");

new Chart(ctxLine, {
  type: "line",
  data: {
    labels: ['senin', 'selasa', 'rabu', 'kamis'],
    datasets: [{
      label: "Jumlah Kunjungan",
      data: [2, 3, 1, 5],
      borderColor: "rgba(75, 192, 192, 1)",
      backgroundColor: "rgba(75, 192, 192, 0.2)",
      fill: true,
      tension: 0.4
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        title: { display: true, text: "Jumlah" }
      },
      x: {
        title: { display: true, text: "Tanggal" }
      }
    }
  }
});