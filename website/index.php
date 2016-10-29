<?php
    require 'db_connection.php';
    
    //show errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //fetch current status
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        echo "Internal Error";
        exit(1);
    }

    $stmt = $conn->prepare("SELECT Status FROM Pumpkin WHERE ID=1");
    if (!$stmt->execute()) {
        echo "Internal Error";
        exit(1);
    }

    $stmt->bind_result($status);
    if (!$stmt->fetch()) {
        echo "Internal Error";
        exit(1);
    }
    
    $stmt->close();
?>
<!--                         @@@
                             @@@
                              @@@                       H A P P Y
                              @@@
                      @@@@@@@@@@@@@@@@@@@@@@         H A L L O W E E N
                    @@@@@@@@@@@@@@@@@@@@@@@@@@
                  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                @@@@@@@@ @@@@@@@@@@@@@@@@ @@@@@@@@
              @@@@@@@@@   @@@@@@@@@@@@@@   @@@@@@@@@
            @@@@@@@@@@     @@@@@@@@@@@@     @@@@@@@@@@
           @@@@@@@@@@       @@@@  @@@@       @@@@@@@@@@
           @@@@@@@@@@@@@@@@@@@@    @@@@@@@@@@@@@@@@@@@@
           @@@@@@@@@@@@@@@@@@        @@@@@@@@@@@@@@@@@@
           @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           @@@@@@@@@ @@@@@@@@@@@@@@@@@@@@@@@@ @@@@@@@@@
            @@@@@@@@  @@ @@ @@ @@ @@ @@ @@ @  @@@@@@@@
              @@@@@@@                        @@@@@@@
                @@@@@@  @@ @@ @@ @@ @@ @@ @ @@@@@@
                  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    @@@@@@@@@@@@@@@@@@@@@@@@@@
                      @@@@@@@@@@@@@@@@@@@@@@ -->
<html>
    <head>
        <title>Pumpkin Pi</title>
    </head>
    <body style='background-color:OrangeRed'>
        <h1>Pumpkin Pi</h1>
        <h3>Very spooky...</h3>
        <br>
        <h2>Current Status: <?php echo $status; ?></h2>
        <form action='switch.php' method='POST'/>
            <input type='hidden' name='Status' value='<?php echo $status; ?>'/>
            <button type='submit'><?php if($status=='On') {echo "Turn Off";} else { echo "Turn On";} ?></button>
        </form>
        <br>
        <br>
        <br>
        <h5>Developed by Francisco Salgado</h5>
    </body>
</html>
