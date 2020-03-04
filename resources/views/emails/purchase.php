<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style='margin:0 auto; width:600px; padding:15px'> 
    
    <div style="text-align:center; width:200px; margin:0 auto">
       <h2>PHEELFRESH</h2>
    </div>

    <h2 style="color:rgba(0, 0, 0, 0.89)">Hello <?= user()->fullname ?>,</h2>
    <p>Your order confirmation details: <span style="color:grey;"> #<?= $data['order_no']?></span></p>

    <table cellspacing="5" cellpadding="5" width="720" style="border: 1px solid black;">
        <tr style="background-color:rgba(0, 0, 0, 0.89); color:white">
            <th style="text-align:left">Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total </th>
       </tr>
       <?php foreach ($data['product'] as $item): ?>

            <tr>
                <td width="450"><?= $item['name'] ?></td>
                <td width="100"> $<?= $item['price'] ?></td>
                <td width="70"><?= $item['quantity'] ?></td>
                <td width="100"> $<?= $item['total'] ?></td>
            </tr>
       <?php endforeach; ?>

    </table>

    <h4>Total amount: $<?= $data['total'] ?></h4>
    <br>
     <p> We hope you love your new purchase(s)!</p> <br>
    <h4>Kind regards </h4> <br>
    <h4> Pheelfresh Customer Care </h4>
    </div>
</body>
</html>