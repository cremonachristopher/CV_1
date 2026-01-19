<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVgenerator</title>
    <style></style>
</head>
<body>
    <div>
        <div>
            <form action="generate_pdf.php">            
                <div>
                    <label>IDENTITÉ</label>
                    <div>
                        <div>    <input type="text" id="in-fname" name="fname" placeholder="Prenom"><br><br>
                        </div>
                        <div>    <input type="text" id="in-lname" name="lname" placeholder="Nom"><br><br>
                        </div>
                    </div>
                        <input type="text" id="in-headline" name="headdline" placeholder="Titre professionnel"> <br><br>
                        <input type="text" id="in-summary" name="summary" placeholder="Résumé de vos points forts"><br><br>
                </div>
                <div>
                    <label>CONTACT & PHOTO</label>
                    <input type="text" id="in-adress" name="adress" placeholder="Adresse (Ville, rue, code postal)">
                    <input type="email" id="in-mail" name="mail" placeholder="email">
                    <input type="text" id="in-linkedin" name="linkedin" placeholder="lien linkedin">
                    <input type="text" id="in-tel" name="tel" placeholder="numero de telephone">
                    <input type="file" id="in-photo" name="photo" accept="image/*">
                </div>
            <hr>
                <div>
                    <label>EXPERIENCES</label>
                    <button id="add-exp">Ajouter</button>
                </div>
                <div id="experience-list">
                </div>
                <div>
                    <label>COMPETENCES</label>
                    <button id="add-skill">Ajouter</button>
                </div>
                <div id="skill-list">
                </div>
                <div>
                    <label>FORMATION</label>
                    <button id="add-train">Ajouter</button>
                </div>
                <div id="train-list">
                </div>

                <div>
                    <label>ENTREPRISE</label>
                    <button id="add-company">Ajouter</button>
                </div>
                <div id="company-list">
                </div>
                <button type="submit">Générer le PDF</button>
            </form>
        </div>
        <div>
            <div id="preview-side">
                <div id="cv-preview">
                    <div id="cv-main">
                        <h1>
                            <span id="out-firstname">PRENOM</span>
                            <span id="out-lastnames">NOM</span>
                        </h1>
                        <div id="out-headline">Titre du Profil
                        </div>
                        <div>Profil</div>
                        <p id="out-summary"></p>
                        <div>Experience professionnelle</div>
                        <div id="out-experiences"></div>
                    </div>
                    <div id="cv-sidebar">
                        <img id="out-photo" src class="d-none">
                        <div>CONTACT</div>
                        <div id="out-adress">Ville, pays, code postale</div>
                        <div id="out-mail">email@exemple.com</div>
                        <div id="out-phone">06 00 00 00 00</div>
                        <div id="out-linkedin">https://www.linkedin.com/in/profil</div>
                    </div>
                    <div id="sidebar-dynamic-content"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>
</html>



•
Expériences professionnelles (plusieurs possibles)
Intitulé du poste
•
Nomdel'entreprise
Date de début
Date de finfacultative
Description des missions
•
Formations (plusieurs possibles)
Intitulé du diplôme ou de la formation
Établissement
Date de début
Date de finfacultative
Description
•
Compétences (plusieurs possibles)
Nomdelacompétence
Niveau (débutant à expert ou notation libre)
•