document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from your Laravel route using AJAX
    fetch('/api/timeline-data')
        .then((response) => response.json())
        .then((data) => {
            // Process the data and format it for the timeline chart
            const timelineData = data.map((item) => ({
                x: 'Event', // Timeline event
                y: [
                    new Date(item.Tanggal_Masuk).getTime(),
                    new Date(item.Tanggal_Keluar).getTime(),
                ],
            }));

            // Create the timeline chart
            const options = {
                series: [
                    {
                        name: 'Timeline',
                        data: timelineData,
                    },
                ],
                chart: {
                    height: 450,
                    type: 'rangeBar',
                },
                // Other chart options
            };

            const chart = new ApexCharts(document.querySelector("#timeline-chart"), options);
            chart.render();
        })
        .catch((error) => {
            console.error('Error fetching timeline data:', error);
        });
});
