// INPUTS (formulaire)
const inFirstName = document.getElementById("in-fname");
const inLastName = document.getElementById("in-lname");
const inHeadline = document.getElementById("in-headline");
const inSummary = document.getElementById("in-summary");
const inAdress = document.getElementById("in-adress");
const inMail = document.getElementById("in-mail");
const inTel = document.getElementById("in-tel");
const inLinkedin = document.getElementById("in-linkedin");
const inPhoto = document.getElementById("in-photo");

// OUTPUTS (preview CV)
const outFirstName = document.getElementById("out-firstname");
const outLastName = document.getElementById("out-lastnames");
const outHeadline = document.getElementById("out-headline");
const outSummary = document.getElementById("out-summary");
const outAdress = document.getElementById("out-adress");
const outMail = document.getElementById("out-mail");
const outPhone = document.getElementById("out-phone");
const outLinkedin = document.getElementById("out-linkedin");
const outPhoto = document.getElementById("out-photo");


inFirstName.addEventListener("input", () => {
    outFirstName.textContent = inFirstName.value || "PRÉNOM";
});
inLastName.addEventListener("input", () => {
    outLastName.textContent = inLastName.value || "NOM";
});

inHeadline.addEventListener("input", () => {
    outHeadline.textContent = inHeadline.value || "Titre du profil";
});

inSummary.addEventListener("input", () => {
    outSummary.textContent = inSummary.value;
});

inAdress.addEventListener("input", () => {
    outAdress.textContent = inAdress.value;
});

inMail.addEventListener("input", () => {
    outMail.textContent = inMail.value;
});

inTel.addEventListener("input", () => {
    outPhone.textContent = inTel.value;
});

inLinkedin.addEventListener("input", () => {
    outLinkedin.textContent = inLinkedin.value;
});

inPhoto.addEventListener("change", () => {
    const file = inPhoto.files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.onload = () => {
        outPhoto.src = reader.result;
        outPhoto.classList.remove("d-none");
    };

    reader.readAsDataURL(file);
});

const addExpBtn = document.getElementById("add-exp");
const expList = document.getElementById("experience-list");
const outExperiences = document.getElementById("out-experiences");

let expCount = 0;

addExpBtn.addEventListener("click", () => {
    expCount++;

    // FORM BLOCK
    const expDiv = document.createElement("div");
    expDiv.className = "dynamic-item";

    expDiv.innerHTML = `
        <input class="form-control mb-2" placeholder="Intitulé du poste">
        <input class="form-control mb-2" placeholder="Entreprise">
        <div class="row">
            <div class="col">
                <input type="date" class="form-control mb-2">
            </div>
            <div class="col">
                <input type="date" class="form-control mb-2">
            </div>
        </div>
        <textarea class="form-control mb-2" rows="2"
                  placeholder="Description des missions"></textarea>
        <hr>
    `;

     expList.appendChild(expDiv);

    // PREVIEW BLOCK
    const previewDiv = document.createElement("div");
    previewDiv.className = "mb-3";
    previewDiv.id = `exp-preview-${expCount}`;

    outExperiences.appendChild(previewDiv);

    // LINK INPUTS → PREVIEW
    const inputs = expDiv.querySelectorAll("input, textarea");

    inputs.forEach((input, index) => {
        input.addEventListener("input", () => {
            updateExperiencePreview(expDiv, previewDiv);
        });
    });
});

function updateExperiencePreview(formBlock, previewBlock) {
    const fields = formBlock.querySelectorAll("input, textarea");

    const poste = fields[0].value;
    const entreprise = fields[1].value;
    const start = fields[2].value;
    const end = fields[3].value;
    const desc = fields[4].value;

    previewBlock.innerHTML = `
        <strong>${poste}</strong><br>
        <em>${entreprise}</em><br>
        <small>${start} - ${end || "Présent"}</small>
        <p>${desc}</p>
    `;
}
