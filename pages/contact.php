<?php
$page='contact';
$metaTitle ="Page contact CV";

$dateactuelle=date('Y-m-d-H-i-s');
$raison=filter_input(INPUT_POST, 'Raison');
$civilite=filter_input(INPUT_POST, 'civilite');
$Nom=filter_input(INPUT_POST, 'Nom');
$Prenom=filter_input(INPUT_POST, 'Prenom');
$mail=filter_input(INPUT_POST, 'mail');
$Message=filter_input(INPUT_POST, 'Message');
file_put_contents("contact_$dateactuelle.txt", "Raison du contact : $raison \n", FILE_APPEND|LOCK_EX);
file_put_contents("contact_$dateactuelle.txt", "Civilité : $civilite \n", FILE_APPEND|LOCK_EX);
file_put_contents("contact_$dateactuelle.txt", "Nom : $Nom\n", FILE_APPEND|LOCK_EX);
file_put_contents("contact_$dateactuelle.txt", "Prénom : $Prenom\n", FILE_APPEND|LOCK_EX);
file_put_contents("contact_$dateactuelle.txt", "Contact : $mail \n", FILE_APPEND|LOCK_EX);
file_put_contents("contact_$dateactuelle.txt", "Corps du message : $Message\n", FILE_APPEND|LOCK_EX);



?>

    <main>

        <h2>Contact</h2>

        <form id="formulaire" action="index.php?page=contact" method="POST">

            <section>
                <p class="comment">Veuilllez préciser la raison de votre contact</p>
                <input type="radio" value="Proposition d'emploi" id="Proposition d'emploi" name="Raison">
                <label for="Proposition d'emploi">Proposition d'emploi</label>

                <input type="radio" value="Demande d'informations" id="Demande d'informations" name="Raison" >
                <label for="Demande d'informations">Demande d'informations</label>

                <input type="radio" value="Prestation" id="Prestation" name="Raison">
                <label for="Prestation">Prestation </label>
            </section>

            <section>
                <p class="comment">Civilité</p>
                <label for="civilité"></label>
                <select name="civilite" id="civilité" >
                    <option selected disabled></option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>

                </select>
            </section>

            <section>
                <label for="Nom">Nom :</label>
                <input type="text" id="Nom" name="Nom" placeholder="Saisissez Nom">
            </section>

            <section>
                <label for="Prenom">Prénom :</label>
                <input type="text" id="Prénom" name="Prénom" placeholder="Saisissez Prénom" >
            </section>

            <section>
                <label for="Mail">e-Mail :</label>
                <input type="email" id="Mail" name="mail" placeholder="Saisissez e-mail" >
            </section>

            <section>
                <label for="message">Message :</label>
                <textarea id="message" name="Message" placeholder="Entrez votre message ici" row="20" cols="20"
                          ></textarea>
            </section>

            <section>
                <button type="submit">Envoyer le message</button>
            </section>

        </form>
    </main>
