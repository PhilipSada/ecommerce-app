import Axios from "axios";

(function(){

    'use strict';

    PHEELFRESH.admin.dashboard = function(){

        charts();
        //call the chart function every 5 seconds
        // setInterval(charts, 5000);

        function charts(){
            
            var revenue = $('#revenue').attr('id');
            var orders = $('#orders').attr('id');

            //labels
            var orderLabels = [];
            var revenueLabels = [];

            var orderData = [];
            var revenueData = [];

            axios.get('/admin/charts').then(function(response){
                response.data.orders.forEach(function(monthly){
                    //count was the alias given in the getChartData function in dashboard controller.php
                    orderData.push(monthly.count);
                    orderLabels.push(monthly.new_date);
                });
                response.data.revenues.forEach(function(monthly){
                    //amount was the alias given in the getChartData function in dashboard controller.php
                    revenueData.push(monthly.amount);
                    revenueLabels.push(monthly.new_date);
                });
            });

            //revenue here refers to var revenue created
            new Chart(revenue, {
                type:'bar',
                data: {
                    labels:revenueLabels,
                    datasets: [
                        {
                            label:'# Revenue',
                            data: revenueData,
                            backgroundColor:['blue']
                        }
                    ]
                }
            });
            new Chart(orders, {
                type:'line',
                data: {
                    labels:orderLabels,
                    datasets: [
                        {
                            label:'# Orders',
                            data: orderData,
                            backgroundColor:['green']
                        }
                    ]
                }
            });

        }
    }
})();