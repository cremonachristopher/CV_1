<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVgenerator</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container-fluid py-4">
    <div class="row">

        <!-- FORMULAIRE -->
        <div class="col-md-6 mb-4">
            <form action="generate_pdf.php" method="post" enctype="multipart/form-data"
                  class="card p-4 shadow-sm">

                <!-- IDENTITÉ -->
                <label class="form-label fs-5 mt-2">IDENTITÉ</label>

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="in-fname" name="fname" class="form-control"
                               placeholder="Prénom">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="in-lname" name="lname" class="form-control"
                               placeholder="Nom">
                    </div>
                </div>

                <input type="text" id="in-headline" name="headline" class="form-control mt-3"
                       placeholder="Titre professionnel">

                <textarea id="in-summary" name="summary" rows="3"
                          class="form-control mt-3"
                          placeholder="Résumé de vos points forts"></textarea>

                <!-- CONTACT -->
                <label class="form-label fs-5 mt-4">CONTACT & PHOTO</label>

                <input type="text" id="in-adress" name="adress" class="form-control"
                       placeholder="Adresse (Ville, rue, code postal)">

                <input type="email" id="in-mail" name="mail" class="form-control mt-2"
                       placeholder="Email">

                <input type="text" id="in-linkedin" name="linkedin" class="form-control mt-2"
                       placeholder="Lien LinkedIn">

                <input type="text" id="in-tel" name="tel" class="form-control mt-2"
                       placeholder="Numéro de téléphone">

                <input type="file" id="in-photo" name="photo"
                       class="form-control mt-2" accept="image/*">

                <hr>

                <!-- EXPERIENCES -->
                <label class="form-label fs-5">EXPÉRIENCES</label>
                <button type="button" id="add-exp"
                        class="btn btn-outline-primary btn-sm mb-2">
                    Ajouter
                </button>
                <div id="experience-list"></div>

                <!-- COMPÉTENCES -->
                <label class="form-label fs-5 mt-3">COMPÉTENCES</label>
                <button type="button" id="add-skill"
                        class="btn btn-outline-primary btn-sm mb-2">
                    Ajouter
                </button>
                <div id="skill-list"></div>

                <!-- FORMATION -->
                <label class="form-label fs-5 mt-3">FORMATION</label>
                <button type="button" id="add-train"
                        class="btn btn-outline-primary btn-sm mb-2">
                    Ajouter
                </button>
                <div id="train-list"></div>

                <!-- ENTREPRISE -->
                <label class="form-label fs-5 mt-3">ENTREPRISE</label>
                <button type="button" id="add-company"
                        class="btn btn-outline-primary btn-sm mb-2">
                    Ajouter
                </button>
                <div id="company-list"></div>

                <button type="submit"
                        class="btn btn-success w-100 mt-4">
                    Générer le PDF
                </button>
            </form>
        </div>

        <!-- PREVIEW -->
        <div class="col-md-6">
            <div id="preview-side" class="card shadow-sm p-3">

                <div id="cv-preview" class="d-flex">

                    <!-- MAIN -->
                    <div id="cv-main" class="flex-grow-1 p-4">
                        <h1>
                            <span id="out-firstname">PRÉNOM</span>
                            <span id="out-lastnames">NOM</span>
                        </h1>

                        <div id="out-headline" class="text-muted mb-3">
                            Titre du Profil
                        </div>

                        <h4>Profil</h4>
                        <p id="out-summary"></p>

                        <h4>Expérience professionnelle</h4>
                        <div id="out-experiences"></div>
                    </div>

                    <!-- SIDEBAR -->
                    <div id="cv-sidebar" class="p-3 text-white">
                        <img id="out-photo"
                             class="img-fluid rounded-circle d-none mb-3">

                        <h5>CONTACT</h5>
                        <div id="out-adress">Ville, pays</div>
                        <div id="out-mail">email@exemple.com</div>
                        <div id="out-phone">06 00 00 00 00</div>
                        <div id="out-linkedin">
                            linkedin.com/in/profil
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>

</body>
</html>
