<?php
include 'header.php'
?>

<main>

    <h2>Contact</h2>

    <form id="formulaire" action="https://httpbin.org/post" method="POST">

        <section>
            <p class="comment" >Veuilllez préciser la raison de votre contact</p>
            <input type="radio" value="Professionnel" id="Professionnel" name="Raison" required>
            <label for="Professionnel">Professionnel</label>

            <input type="radio" value="Personnel" id="Personnel" name="Raison" required>
            <label for="Personnel">Personnel</label>
        </section>

        <section>
            <p class="comment" >Comment avez vous découvert mon site ?</p>
            <label for="découverte"></label>
            <select name="découverte" id="découverte" required>
                <option selected disabled></option>
                <option value="Recruteur">Recruteur</option>
                <option value="Bouche_a_oreille">Bouche à oreille</option>
                <option value="Autre">Autre</option>
            </select>
        </section>

        <section>
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" placeholder="Saisissez Nom" required>
        </section>

        <section>
            <label for="Prénom">Prénom :</label>
            <input type="text" id="Prénom" name="Prénom" placeholder="Saisissez Prénom" required>
        </section>

        <section>
            <label for="Mail">e-Mail :</label>
            <input type="email" id="Mail" name="mail" placeholder="Saisissez e-mail" required>
        </section>

        <section>
            <label for="message">Message :</label>
            <textarea id="message" name="Message" placeholder="Entrez votre message ici" row="20" cols="20"  required></textarea>
        </section>

        <section>
            <button type="submit">Envoyer le message</button>
        </section>

    </form>





</main>

<?php
include 'footer.php'
?>
