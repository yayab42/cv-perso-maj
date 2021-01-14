<?php
$page = 'contact';
$nomclassboolean=false;
$metaTitle = "Page contact CV";

$dateActuelle = date('Y-m-d-H-i-s');
$raison = filter_input(INPUT_POST, 'Raison');
$civilite = filter_input(INPUT_POST, 'civilite');
$nom = filter_input(INPUT_POST, 'Nom');
$prenom = filter_input(INPUT_POST, 'Prenom');
$mail = filter_input(INPUT_POST, 'mail',FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, 'Message');
$submit = filter_input(INPUT_POST, 'submit');
$error=true;
$formErrors=array(
        "raison"=>"",
        "nom"=>"",
        "prenom"=> "",
        "civilite"=>"",
        "mail"=> "",
        "message"=>"",
);

if (!empty($submit)) {

        if (empty($raison)) {
            $formErrors['raison']="Veuillez renseigner la raison";
            $error=false;
        }
        if (empty($nom)) {
            $error=false;
            $formErrors['nom']="Veuillez renseigner votre nom";
        }
        if (empty($prenom)) {
            $error=false;
            $formErrors['prenom']="Veuillez renseigner votre prénom";
        }
        if (empty($civilite)) {
            $error=false;
            $formErrors['civilite']="Veuillez renseigner votre état civil";
        }
        if (empty($mail)) {
            $error=false;
            $formErrors['mail']="Veuillez renseigner votre mail";
        }
        if (empty($message)) {
            $error=false;
            $formErrors['message']="Veuillez renseigner votre message";
        }
        if (strlen($message)<5){
        $error=false;
        $errormsgmessage="Votre message doit contenir au moins 5 caractères";
        }
        if($error==true) {
            file_put_contents("contact_$dateActuelle.txt", "Raison du contact : $raison \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Civilité : $civilite \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Nom : $nom\n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Prénom : $prenom\n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Contact : $mail \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Corps du message : $message\n", FILE_APPEND | LOCK_EX);
        }
}
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
            <input type="email" id="Mail" name="mail" placeholder="Saisissez e-mail"><br>
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
