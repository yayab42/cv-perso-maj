<?php
$page='contact';
?>
<?php
$metaTitle ="Page contact CV";
?>


<?php
$_POST['Raison']= filter_input(INPUT_POST, 'Raison', $filter=FILTER_DEFAULT);

$_POST['civilite']=filter_input(INPUT_POST, 'civilite', $filter=FILTER_DEFAULT);

$_POST['Nom']=filter_input(INPUT_POST, 'Nom', $filter=FILTER_DEFAULT);

$_POST['Prenom']=filter_input(INPUT_POST, 'Prenom', $filter=FILTER_DEFAULT);

$_POST['mail']=filter_input(INPUT_POST, 'mail',  $filter=FILTER_DEFAULT);

$_POST['Message']=filter_input(INPUT_POST, 'Message', $filter=FILTER_DEFAULT);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed $Raison, int $flags=0);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed $civilite, int $flags=0);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed $Nom, int $flags=0);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed $Prenom, int $flags=0,);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed $mail, int $flags=0,);
file_put_contents(string $contact_Y-m-d-H-i-s.txt, mixed Message, int $flags=0,);
?>

    <main>

        <h2>Contact</h2>

        <form id="formulaire" action="index.php?page=contact/post" method="POST">

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
