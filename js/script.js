const inFirstName = document.getElementById("in-fname");
const inLastName = document.getElementById("in-lname");
const inHeadline = document.getElementById("in-headline");
const inSummary = document.getElementById("in-summary");
const inAdress = document.getElementById("in-adress");
const inMail = document.getElementById("in-mail");
const inTel = document.getElementById("in-tel");
const inLinkedin = document.getElementById("in-linkedin");
const inPhoto = document.getElementById("in-photo");

const outFirstName = document.getElementById("out-firstname");
const outLastName = document.getElementById("out-lastnames");
const outHeadline = document.getElementById("out-headline");
const outSummary = document.getElementById("out-summary");
const outAdress = document.getElementById("out-adress");
const outMail = document.getElementById("out-mail");
const outPhone = document.getElementById("out-phone");
const outLinkedin = document.getElementById("out-linkedin");
const outPhoto = document.getElementById("out-photo");

inFirstName.addEventListener("input", () => outFirstName.textContent = inFirstName.value || "PRÉNOM");
inLastName.addEventListener("input", () => outLastName.textContent = inLastName.value || "NOM");
inHeadline.addEventListener("input", () => outHeadline.textContent = inHeadline.value || "Titre du profil");
inSummary.addEventListener("input", () => outSummary.textContent = inSummary.value);
inAdress.addEventListener("input", () => outAdress.textContent = inAdress.value);
inMail.addEventListener("input", () => outMail.textContent = inMail.value);
inTel.addEventListener("input", () => outPhone.textContent = inTel.value);
inLinkedin.addEventListener("input", () => outLinkedin.textContent = inLinkedin.value);

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

function addDeleteButton(formDiv, previewDiv) {
    const deleteBtn = document.createElement("button");
    deleteBtn.type = "button";
    deleteBtn.className = "btn btn-danger btn-sm mb-2";
    deleteBtn.textContent = "Supprimer";
    formDiv.appendChild(deleteBtn);

    deleteBtn.addEventListener("click", () => {
        formDiv.remove();
        previewDiv.remove();
    });
}

const addExpBtn = document.getElementById("add-exp");
const expList = document.getElementById("experience-list");
const outExperiences = document.getElementById("out-experiences");

let expCount = 0;

addExpBtn.addEventListener("click", () => {
    expCount++;
    const expDiv = document.createElement("div");
    expDiv.className = "dynamic-item";

    expDiv.innerHTML = `
        <input name="exp_poste[]" class="form-control mb-2" placeholder="Intitulé du poste">
        <input name="exp_entreprise[]" class="form-control mb-2" placeholder="Entreprise">
        <div class="row">
            <div class="col"><input name="exp_start[]" type="date" class="form-control mb-2"></div>
            <div class="col"><input name="exp_end[]" type="date" class="form-control mb-2"></div>
        </div>
        <textarea name="exp_desc[]" class="form-control mb-2" rows="2"></textarea>
        <hr>
    `;
    expList.appendChild(expDiv);

    const previewDiv = document.createElement("div");
    previewDiv.className = "mb-3";
    outExperiences.appendChild(previewDiv);

    const inputs = expDiv.querySelectorAll("input, textarea");
    inputs.forEach(() => updateExperiencePreview(expDiv, previewDiv));
    inputs.forEach(input => input.addEventListener("input", () => updateExperiencePreview(expDiv, previewDiv)));

    addDeleteButton(expDiv, previewDiv);
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

const addTrainBtn = document.getElementById("add-train");
const trainList = document.getElementById("train-list");
const outTrainings = document.getElementById("out-trainings");

addTrainBtn.addEventListener("click", () => {
    const trainDiv = document.createElement("div");
    trainDiv.className = "dynamic-item";

    trainDiv.innerHTML = `
        <input name="train_diploma[]" class="form-control mb-2" placeholder="Diplôme / Formation">
        <input name="train_school[]" class="form-control mb-2" placeholder="Établissement">
        <div class="row">
            <div class="col"><input name="train_start[]" type="date" class="form-control mb-2"></div>
            <div class="col"><input name="train_end[]" type="date" class="form-control mb-2"></div>
        </div>
        <textarea name="train_desc[]" class="form-control mb-2" rows="2" placeholder="Description de la formation"></textarea>
        <hr>
    `;
    trainList.appendChild(trainDiv);

    const previewDiv = document.createElement("div");
    previewDiv.className = "mb-3";
    outTrainings.appendChild(previewDiv);

    const inputs = trainDiv.querySelectorAll("input, textarea");
    inputs.forEach(() => updateTrainingPreview(trainDiv, previewDiv));
    inputs.forEach(input => input.addEventListener("input", () => updateTrainingPreview(trainDiv, previewDiv)));

    addDeleteButton(trainDiv, previewDiv);
});

function updateTrainingPreview(formBlock, previewBlock) {
    const fields = formBlock.querySelectorAll("input, textarea");
    const diploma = fields[0].value;
    const school = fields[1].value;
    const start = fields[2].value;
    const end = fields[3].value;
    const desc = fields[4].value;

    previewBlock.innerHTML = `
        <strong>${diploma || "Diplôme"}</strong><br>
        <em>${school || "Établissement"}</em><br>
        <small>${start || "----"} - ${end || "----"}</small>
        <p>${desc || ""}</p>
    `;
}

const addCompanyBtn = document.getElementById("add-company");
const companyList = document.getElementById("company-list");
const outCompanies = document.getElementById("out-companies");

addCompanyBtn.addEventListener("click", () => {
    const companyDiv = document.createElement("div");
    companyDiv.className = "dynamic-item";

    companyDiv.innerHTML = `
        <input name="company_name[]" class="form-control mb-2" placeholder="Nom de l’entreprise">
        <input name="company_sector[]" class="form-control mb-2" placeholder="Secteur d’activité">
        <textarea name="company_desc[]" class="form-control mb-2" rows="2" placeholder="Description de l’entreprise"></textarea>
        <hr>
    `;
    companyList.appendChild(companyDiv);

    const previewDiv = document.createElement("div");
    previewDiv.className = "mb-3";
    outCompanies.appendChild(previewDiv);

    const inputs = companyDiv.querySelectorAll("input, textarea");
    inputs.forEach(() => updateCompanyPreview(companyDiv, previewDiv));
    inputs.forEach(input => input.addEventListener("input", () => updateCompanyPreview(companyDiv, previewDiv)));

    addDeleteButton(companyDiv, previewDiv);
});

function updateCompanyPreview(formBlock, previewBlock) {
    const fields = formBlock.querySelectorAll("input, textarea");
    const name = fields[0].value;
    const sector = fields[1].value;
    const desc = fields[2].value;

    previewBlock.innerHTML = `
        <strong>${name || "Entreprise"}</strong><br>
        <em>${sector || "Secteur"}</em>
        <p>${desc || ""}</p>
    `;
}

const addSkillBtn = document.getElementById("add-skill");
const skillList = document.getElementById("skill-list");
const outSkills = document.getElementById("out-skills");

addSkillBtn.addEventListener("click", () => {
    const skillDiv = document.createElement("div");
    skillDiv.className = "dynamic-item";

    skillDiv.innerHTML = `
        <input name="skills[]" class="form-control mb-2" placeholder="Compétence">
        <hr>
    `;
    skillList.appendChild(skillDiv);

    const li = document.createElement("li");
    li.textContent = "Nouvelle compétence";
    outSkills.appendChild(li);

    const input = skillDiv.querySelector("input");
    input.addEventListener("input", () => {
        li.textContent = input.value || "Nouvelle compétence";
    });

    addDeleteButton(skillDiv, li);
});
