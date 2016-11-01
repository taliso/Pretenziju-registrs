1. failu ievilksana ieladei
2. e-pastu izsutisana
3. vizuals apstiprinajums
4. datu verifikacija

Aģentu saraksta ielāde ???
Tekošā reģistrācijas numura nolasīšana. Reģistri var būt vairāki.
Funkcija LogInInfo

07.10
Izlogošanās poga
Datuma formēšana veidlapā
Veidlapai vajag savu apakšmeņjū (Labot, dzēst, nākošie soļi)
Veidlapai vajag savu virsrakstu

Testa fragments datumam
<!--		<select name="noform_diena">
         <?php
			echo diena_select($fixdat);
          ?>
		</select>
     <select name="noform_menes">
         <?php
			echo menes_select($fixdat);
          ?>
       </select>
      <select name="noform_gads">
         <?php
        	 echo gads_select($fixdat); 
          ?>
      </select>  -->
      
      
      
$ip = "127.0.0.1";

if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
    echo("$ip is a valid IP address");
} else {
    echo("$ip is not a valid IP address");
}
========================================================================================
MySQL===================================================================================
 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
