1. failu ievilksana ieladei
2. e-pastu izsutisana
3. vizuals apstiprinajums
4. datu verifikacija

Idejas
	Visu datuma veidosanas trislauku aizvietot ar funkciju:
										Vajadzigi divi argumenti: 	datums no datubazes vai datubazei
							 Nosaukums,kas raksturo $_POST lauku:   piemeram "formesanas" "_datuma"
							 
							 
	function log($tekst) {
		define('LOGFILE','/tmp/fakesendmail.log');

		$log = fopen (LOGFILE,'a+');

		fwrite($log,"\n".implode(' ',$argv).
		 " called on : ".date('Y-m-d H:i:s')."\n");

		fwrite($log,file_get_contents("php://stdin"));
		fwrite($log,
	"\n===========================================================\n");
		fclose($log);
	}

							     