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
      