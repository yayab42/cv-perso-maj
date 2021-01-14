<?php
$page = 'contact';
$nomclassboolean=false;
$metaTitle = "Page contact CV";

$dateActuelle = date('Y-m-d-H-i-s');
$raison = filter_input(INPUT_POST, 'Raison');
$civilite = filter_input(INPUT_POST, 'civilite');
$Nom = filter_input(INPUT_POST, 'Nom');
$prenom = filter_input(INPUT_POST, 'Prenom');
$mail = filter_input(INPUT_POST, 'mail');
$Message = filter_input(INPUT_POST, 'Message');
$submit = filter_input(INPUT_POST, 'submit');
$error=true;
$errormsgraison="";
$errormsgnom="";
$errormsgprenom="";
$errormsgcivilite="";
$errormsgmail="";
$errormsgmessage="";
if (!empty($submit)) {

        if (empty($raison)) {
            $errormsgraison="Veuillez renseigner la raison";
            $error=false;
        }
        if (empty($Nom)) {
            $error=false;
            $errormsgnom= "Veuillez renseigner votre nom";
        }
        if (empty($prenom)) {
            $error=false;
            $errormsgprenom= "Veuillez renseigner votre prénom";
        }
        if (empty($civilite)) {
            $error=false;
            $errormsgcivilite= "Veuillez renseigner votre état civil";
        }
        if (empty($mail)) {
            $error=false;
            $errormsgmail= "Veuillez renseigner votre e-mail";
        }
        if (empty($Message)) {
            $error=false;
            $errormsgmessage= "Veuillez renseigner le corps de message";
        }
        if($error==true) {
            file_put_contents("contact_$dateActuelle.txt", "Raison du contact : $raison \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Civilité : $civilite \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Nom : $Nom\n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Prénom : $prenom\n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Contact : $mail \n", FILE_APPEND | LOCK_EX);
            file_put_contents("contact_$dateActuelle.txt", "Corps du message : $Message\n", FILE_APPEND | LOCK_EX);
        }
}
?>

<main>

    <h2>Contact</h2>

    <form id="formulaire" method="POST"  action="index.php?page=contact">

        <section>
            <?php echo $errormsgraison ?><br>
            <p class="comment">Veuilllez préciser la raison de votre contact</p>
            <input type="radio" value="Proposition d'emploi" id="Proposition d'emploi" name="Raison">
            <label for="Proposition d'emploi">Proposition d'emploi</label>

            <input type="radio" value="Demande d'informations" id="Demande d'informations" name="Raison">
            <label for="Demande d'informations">Demande d'informations</label>

            <input type="radio" value="Prestation" id="Prestation" name="Raison">
            <label for="Prestation">Prestation </label><br>
        </section>

        <section>
            <?php echo $errormsgcivilite ?><br>
            <p class="comment">Civilité</p>
            <label for="civilité"></label>
            <select name="civilite" id="civilité">
                <option selected disabled></option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>

            </select><br>
        </section>

        <section>
            <?php echo $errormsgnom ?> <br><br>
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" placeholder="Saisissez Nom"><br>
        </section>

        <section>
            <?php echo $errormsgprenom ?> <br><br>
            <label for="Prenom">Prénom :</label>
            <input type="text" id="Prénom" name="Prenom" placeholder="Saisissez Prénom"><br>
        </section>

        <section>
            <?php echo $errormsgmail ?> <br><br>
            <label for="Mail">e-Mail :</label>
            <input type="email" id="Mail" name="mail" placeholder="Saisissez e-mail"><br>
        </section>

        <section>
            <?php echo $errormsgmessage ?> <br><br>
            <label for="message">Message :</label>
            <textarea id="message" name="Message" placeholder="Entrez votre message ici" row="20" cols="20"
            ></textarea><br>
        </section>

        <section>
            <input type="submit" name="submit" value="envoyer">
        </section><br>

    </form>
</main>
