<?php
$page = 'contact';
$nomclassboolean=false;
$formErrors=array(
    "Raison"=>"",
    "Nom"=>"",
    "Prenom"=> "",
    "civilite"=>"",
    "mail"=> "",
    "Message"=>"",
);

$arguments=array(
        'Raison'=>FILTER_SANITIZE_STRING,
        'civilite'=>FILTER_SANITIZE_STRING,
        'Nom'=>FILTER_SANITIZE_STRING,
        'Prenom'=>FILTER_SANITIZE_STRING,
        'mail'=>FILTER_VALIDATE_EMAIL,
        'Message'=>FILTER_SANITIZE_STRING,
        'submit'=>FILTER_SANITIZE_STRING
);
$formErrorsFilter=filter_input_array(INPUT_POST,$arguments);


$dateActuelle = date('Y-m-d-H-i-s');
$data=[
        "Raison du contact : " .  $formErrorsFilter['Raison'] . "\n",
        "Civilite : " . $formErrorsFilter['civilite'] . "\n",
        "Nom : " . $formErrorsFilter['Nom'] . "\n",
        "Prenom : " . $formErrorsFilter['Prenom'] . "\n",
        "Mail : " . $formErrorsFilter['mail'] . "\n",
        "Message : " . $formErrorsFilter['Message'] . "\n",
];

$error=true;
if (!empty($formErrorsFilter['submit'])) {

        if (empty($formErrorsFilter['Raison'])) {
            $formErrors['Raison']="Veuillez renseigner la raison";
            $error=false;
        }
        if (empty($formErrorsFilter['Nom'])) {
            $error=false;
            $formErrors['Nom']="Veuillez renseigner votre nom";
        }
        if (empty($formErrorsFilter['Prenom'])) {
            $error=false;
            $formErrors['Prenom']="Veuillez renseigner votre prénom";
        }
        if (empty($formErrorsFilter['civilite'])) {
            $error=false;
            $formErrors['civilite']="Veuillez renseigner votre état civil";
        }
        if (empty($formErrorsFilter['mail'])) {
            $error=false;
            $formErrors['mail']="Veuillez renseigner votre mail";
        }
        if (empty($formErrorsFilter['Message'])) {
            $error=false;
            $formErrors['Message']="Veuillez renseigner votre message";
        }
        if (strlen($formErrorsFilter['Message'])<5){
        $error=false;
        $errormsgmessage="Votre message doit contenir au moins 5 caractères";
        }
        if($error==true) {
              file_put_contents("contact_$dateActuelle.txt",$data);
        }
}
ob_start();
?>

<main>

    <h2>Contact</h2>

    <form id="formulaire" method="POST"  action="index.php?page=contact">

        <section>
            <?php if(isset($formErrors['raison'])){
            echo $formErrors['raison'];} ?><br>
            <p class="comment">Veuilllez préciser la raison de votre contact</p>
            <input type="radio" value="Proposition d'emploi" id="Proposition d'emploi" name="Raison">
            <label for="Proposition d'emploi">Proposition d'emploi</label>

            <input type="radio" value="Demande d'informations" id="Demande d'informations" name="Raison">
            <label for="Demande d'informations">Demande d'informations</label>

            <input type="radio" value="Prestation" id="Prestation" name="Raison">
            <label for="Prestation">Prestation </label><br>
        </section>

        <section>
            <?php if(isset($formErrors['civilite'])){
                echo $formErrors['civilite'];} ?><br>
            <p class="comment">Civilité</p>
            <label for="civilité"></label>
            <select name="civilite" id="civilité">
                <option selected disabled></option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>

            </select><br>
        </section>

        <section>
            <?php if(isset($formErrors['nom'])){
                echo $formErrors['nom'];}?> <br><br>
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" placeholder="Saisissez Nom"><br>
        </section>

        <section>
            <?php if(isset($formErrors['prenom'])){
                echo $formErrors['prenom'];} ?> <br><br>
            <label for="Prenom">Prénom :</label>
            <input type="text" id="Prénom" name="Prenom" placeholder="Saisissez Prénom"><br>
        </section>

        <section>
            <?php if(isset($formErrors['mail'])){
                echo $formErrors['mail'];} ?> <br><br>
            <label for="Mail">e-Mail :</label>
            <input type="text" id="Mail" name="mail" placeholder="Saisissez e-mail"><br>
        </section>

        <section>
            <?php if(isset($formErrors['message'])){
            echo $formErrors['message'];}?> <br><br>
            <label for="message">Message :</label>
            <textarea id="message" name="Message" placeholder="Entrez votre message ici" row="20" cols="20"
            ></textarea><br>
        </section>

        <section>
            <input type="submit" name="submit" value="envoyer">
        </section><br>

    </form>
</main>
<?php
$buffer=ob_get_contents();
?>