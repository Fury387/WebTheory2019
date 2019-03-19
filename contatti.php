<?php /* ########################################## INCLUDE - INIZIO ################################################## */

include($_SERVER['DOCUMENT_ROOT']."/includes/structures/header.php");
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/nav.php"); 

<?php
include_once('include/class.phpmailer.php');
include_once('include/validazione.php');

if(isset($_GET['send']) and ($_GET['send']=='1')) {

    $mittente=(trim($_POST['email']));
    $nome=(trim($_POST['nome']));
    $cognome=(trim($_POST['cognome']));
    $nomemittente=($cognome.' '.$nome);
    $telefono=(trim($_POST['telefono']));
    $oggettoemail="Nuovo Messaggio Ricevuto dal form Contatti WebTheory";
    $testoalternativo="Nuovo Messaggio Ricevuto da Sito WebTheory";
    $destinatario="webmaster@webtheory.it";
    $messaggio=(trim($_POST['text']));

    // INIZIO VALIDAZIONE
    $validazione = TRUE;
    $validazione_errore = "";

   

   	// Controllo Nome
    if ((validations_richiesto($nome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Nome<br>";
   	endif;

 // Controllo Email
    if ((validations_richiesto($mittente) == FALSE) or (validations_email($mittente) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nella Email<br>";
   	endif;

   	// Controllo Cognome
    if ((validations_richiesto($cognome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Cognome<br>";
   	endif;

   	// Controllo Messaggio
    if ((validations_richiesto($messaggio) == FALSE) or (validations_lunghezza(3, 600, $messaggio) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Messaggio<br>";
   	endif;


    if ($validazione) {
	    $mail             = new PHPMailer(); //chiamata per creare l'email
	    $body             = "<p>Mittente: ".$nomemittente. "</p>"."<p>Numero di telefono: ".$telefono."<p>Messaggio: ".$messaggio."</p>"; 
	    //mail->getFile("include/mails/user_reg.php"); 
	    //$body             = eregi_replace("[\]",'',$body);
	    $mail->From       = $mittente;
	    $mail->FromName   = $nomemittente;
	    $mail->Subject    = $oggettoemail;
	    $mail->AltBody    = $testoalternativo;
	    $mail->MsgHTML($body);
	    $mail->AddAddress($destinatario, "WebTheory");
	    //$mail->AddAttachment("images/phpmailer.gif"); 
	    $_SESSION=array();
	    if(!$mail->Send()) { echo "Mailer Error: " . $mail->ErrorInfo; } 
	    else { header("location:contatti.php?ok=1"); }
	}
}
?>
/* ################################################ INCLUDE - FINE ################################################# */ ?>
 <div class="container sezionecontatti">
            <div class="row rowpadding">
	            <!--Contattami -->
                <div class="col-lg-12 col-sm-12">
	                <h2 class="textcenter">Contattami</h2>
                </div>
            </div>
            <div class="row textcenter rowpadding">
				<div class="col-lg-4 col-sm-12 rowpadding">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/contact%20mail%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu"><a href="mailto:info@webtheory.it">info@webtheory.it</a></h3>
	                    
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 midlebox rowpadding">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/tel%20contantc%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu"><a href="tel:3495656479">3495656479</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 rowpadding">
                    <div class="col-lg-2">
		                <img class="iconcontact" src="img/facebook%20contact%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu"><a href="https://www.facebook.com/WebTheory.it/" target="_blank">facebook</a></h3>
                    </div>
                </div>
            </div>
            
            <div class="row textcenter rowpadding">
	            <!--vieni a trovarmi -->
                <div class="col-lg-12 col-sm-12">
	                <h2>Vieni a trovarmi</h2>
	                <p class="textcenter"> Al <a href="https://sellalab.com/"><strong class="blu">SellaLab</strong>  </a>Biella (<strong>Ricevo solo su appuntamento</strong>)</p>
	                <p> Do valore al tempo di tutti. Probabilmente se vieni senza appuntamento mi troverai impegnato con qualche altro cliente e se ti presenti senza avvisare sarebbe poco efficiente per entrambi doverti chiedere di passare in un altro momento.</p>
                </div>
            </div>
            <div class="row textcenter rowpadding">
				<div class="col-lg-4 col-sm-12 rowpadding">
	             
	                    <h3 class="blu">Lun-Mer-Ven</h3>
	                    
                    
                </div>
                <div class="col-lg-4 col-sm-12 midlebox rowpadding">
	              
                  
	                    <h3 class="blu">9:00 - 18:00</h3>
                  
                </div>
                <div class="col-lg-4 col-sm-12 rowpadding">
                   
                  
	                    <h3 class="blu">Via Corradino Sella, 10</h3>
                    
                </div>
            </div>
			
 </div>
<div class="row">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4426.106844273936!2d8.053574643731775!3d45.57184762357122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeeac9af52f9ee53f!2sWeb+Theory+Consulenza+Informatica!5e0!3m2!1sit!2sit!4v1545081910585" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

	 <div class="container">
            <div class="row">
	            <!--Contattami -->
                <div class="col-lg-12 col-sm-12">
	                <h2 class="textcenter">Oppure scrivimi</h2>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-sm-12">
<?php /* ########################################## INCLUDE - INIZIO ################################################## */
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/form.php");
/* ################################################ INCLUDE - FINE ################################################# */ ?>
                </div>
                <div class="col-lg-3 "></div>
                <div class="row rowpadding"></div>
                
            </div>
	 </div>

    
  <?php /* ########################################## INCLUDE - INIZIO ################################################## */
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/footer.php");
/* ################################################ INCLUDE - FINE ################################################# */ ?>