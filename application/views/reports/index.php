<!DOCTYPE HTML>
<html>
<head>
    <title>Leads and Clients</title>
    <script>
        window.onload = function () {
        var options = {
            title: {
                text: "Customers and number of new leads"
            },
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 40,
                toolTipContent: "<b>{label}</b>: {y}%",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y}",
                dataPoints: [
        <?php   foreach ($customers as $customer) {
                    echo "{ y: " . $customer['num_leads'] . ", label: '" . $customer['first_name'] . " " . $customer['last_name'] . "' },";
                } ?>
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);
        }
    </script>
</head>
<body>
    <h1>Report Dashboard</h1>
    <h2>List of all customers and # of leads</h2><br>
    <form action='../report/update' method='post'>
        <input type='date' name='from'>
        <input type='date' name='to'>
        <input type='submit' value='Update'>
    </form>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Number of Leads</th>
        </tr>
<?php   foreach ($customers as $customer) { ?>
        <tr>
            <td><?= $customer['first_name'] . " " . $customer['last_name']; ?></td>
            <td><?= $customer['num_leads']; ?></td>
        </tr>
<?php   } ?> 
    </table>
    <div id="chartContainer" style="height: 370px; width: 600px;"></div>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>