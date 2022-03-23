<?php 
?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facture ZARA </title>
	<link rel="stylesheet" href="facture_salome.css">
</head>
<body>

<?php 

function date_jour()
{
	$jour = date("w");
	
	$tableau = array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi");
	
	return($tableau[$jour]);
}

function date_mois()
{
	$mois = date("n");
	
	$tableau = array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre");
	
	$mois--;
	
	return($tableau[$mois]);
}

date_default_timezone_set("Europe/Paris");


$date = date("Y.m.d");
$date = str_replace(".", "",$date);
$date = $date.mt_rand(1,9).mt_rand(1,9);
$num_facture = $date;


$client = array(
"nom"=> "Guez",
"prenom" => "Salomé",
"mail"=> "guezsalome@gmail.com",
"telephone" => "0698489234",
"adresse" => "27 rue de la saussière 92100",
"ville" => " Boulogne-Billancourt"
);

$societe = array(

    "marque"=>"Zara",
    "mail"=>"zara.contact@gmail.com",
    "telephone"=>" 01 55 38 93 30",
    "adresse"=>"5 Rue Tony Garnier Boulogne Billancourt",
    "cc" => "Les passages "
     );

?>

<div id="style">

  <div id="stylee"></div>

  <div id="s1">
    
    <div id="s2">

      <div class="info">

        <h2> <?php echo($client["prenom"]);?> <?php echo($client["nom"]);?> </h2>

        <p> 


           <?php echo($client["adresse"]);?> </br>

            <?php echo($client["ville"]);?> <br>

            <?php echo($client["mail"]);?> <br>

            <?php echo("Numéro : ".$client["telephone"]);?> 

        </p>

      </div>

      <div class="titre">

        <h1>Facture n°<?php echo($num_facture);?></h1>

        <p>
           <?php echo(ucfirst(date_jour())." ".date("d")." ".ucfirst(date_mois())." ".date("Y"));?> 
       </p>

        <p> <?php echo(date("H:i:s"));?> </p>

      </div>

    </div>

    <div id="s3">
      
      <div class="societe"></div>

      <div class="info">

        <h2> <?php echo($societe["marque"]);?> </h2>
        
        <p>

           <?php echo($societe["telephone"]);?> 

         </p>

         <p>

            <?php echo($societe["mail"]);?>

         </p>

      </div>

      <div id="sss">

        <h2>Adresse</h2>

        <p>

           <?php echo($societe["cc"]);?>

        </p>

        <p>

          <?php echo($societe["adresse"]);?> 

              
        </p>
       
      </div>  

      </div>

      <div id="s4">
      
      <div id="table">

        <table>

          <tr class="titretableau">

            <td> <h3> Article </h3> </td>
            <td> <h3> Référence </h3> </td>
            <td> <h3> Quantité </h3> </td>
            <td> <h3> Prix HT </h3> </td>
            <td> <h3> Sous-total </h3> </td>

          </tr class="titretableau">

<?php 


$produit = array(

array(
"nom"=> "Pull",
"quantite"=> mt_rand(1,12),
"prix_ht" => 29.95,
"reference"=> "3A56D8"
),

array(
"nom"=> "Jupe",
"quantite"=> mt_rand(1,15),
"prix_ht" => 25.95,
"reference"=> "87Y65D"
),

array(
"nom"=> "Robe",
"quantite"=> mt_rand(1,10),
"prix_ht" => 39.95,
"reference"=> "093RB6"
),

array(
"nom"=> "Jean",
"quantite"=> mt_rand(1,34),
"prix_ht" => 35.95,
"reference"=> "P894TN"
),

array(
"nom"=> "Echarpe",
"quantite"=> mt_rand(1,24),
"prix_ht" => 15.95,
"reference"=> "58J7YB"
),

array(
"nom"=> "Bijoux",
"quantite"=> mt_rand(1,35),
"prix_ht" => 12.95,
"reference"=> "BI876N"
)

);

$total_global = 0;

foreach ($produit as $value)

{


echo("<tr class=\"tableau_\">"); 

echo("<td class=\"tableau\">".$value["nom"]."</td>");

echo("<td class=\"tableau\">".$value["reference"]."</td>");

echo("<td class=\"quantite\">".$value["quantite"]."</td>");

echo("<td class=\"tableau\">".$value["prix_ht"]." €</td>");

echo("<td class=\"tableau\">".$value["prix_ht"]*$value["quantite"]." €</td>");

echo("</tr class=\"tableau_\">");

echo("</table");

$total_global+=$value["prix_ht"]*$value["quantite"];


}

$tva = $total_global * 0.2; 

$total_ttc = $total_global + $tva;


?>

  </table>

  <table>
  
       <tr class="tabl2">

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td><strong>Total HT</strong></td>
            <td><strong><?php echo(number_format($total_global, 2, ',', ' ')); ?> €</strong></td>

       </tr>

       <tr class="tabl2">

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td> TVA 20%</td>
            <td><?php echo(number_format($tva, 2, ',', ' '));?> €</td>

        </tr>

        <tr class="tabl2">

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td><strong>Total TTC</strong></td>
            <td><strong><?php echo(number_format($total_ttc, 2, ',', ' ')); ?> €</strong></td>

        </tr>
          
    </table>

      </div> 

      
      <div id="loi">

        <p class="legal">
       
		Conditions de paiement : paiement à réception de facture, 20 jours.<br><br>

    Aucun escompte consenti pour règlement anticipé. <br> <br>

		En cas de retard de paiement, indemnité forfaitaire pour frais de recouvrement : 40 euros (art.L. 441-6 code du commerce).

        </p>

      </div>
      
    </div>

</body>
</html>











