<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            th {
                border: 1px solid black;
                background-color: E6E6FA;
                text-align: center;
                padding: 8px;
            }
            td {
                border: 1px solid ;
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>

    <body>

        <?php
        $customers = $this->registry['customer'];
        ?>

        <table>
            <tr>
                <th> <span class="name"> Ім'я</span></th>
                <th><span class="name">Номер телефону</span></th>
                <th><span class="name">E-mail</span></th>
                <th><span class="name">Місто</span></th>
            </tr>

            <?php
            foreach ($customers as $customer) :
                ?>
                <tr>
                    <td><?php echo $customer['last_name'] . ' ' . $customer['first_name'] ?></td>
                    <td><?php echo $customer['telephone'] ?></td>
                    <td><?php echo $customer['email'] ?></td>
                    <td><?php echo $customer['city'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>    
    </body>
</html>