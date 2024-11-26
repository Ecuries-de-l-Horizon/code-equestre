document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('test');
    const additionalFields = document.getElementById('additionalFields');
    
    const checkboxRes = document.getElementById('res'); // Case à cocher pour Responsable
    const checkboxProp = document.getElementById('prop'); // Case à cocher pour Propriétaire

    function updateFields() {
        additionalFields.innerHTML = ''; // Vider les champs avant chaque mise à jour

        // Si "Responsable" est coché, on ajoute ses champs
        if (checkboxRes.checked) {
            additionalFields.innerHTML += `
                <label for="field1">Responsable :</label>
                <input type="text" id="nomres" name="nomres" placeholder="Nom du responsable"><br>
                <input type="text" id="prenomres" name="prenomres" placeholder="Prénom du responsable"><br>
                <input type="text" id="rueres" name="rueres" placeholder="Rue"><br>
                <input type="text" id="cpres" name="cpres" placeholder="Code postal"><br>
                <input type="text" id="telres" name="telres" placeholder="Téléphone"><br>
                <input type="text" id="emailres" name="emailres" placeholder="Email"><br>
                <input type="text" id="mdpres" name="mdpres" placeholder="Mot de passe"><br>
            `;
        }

        // Si "Propriétaire" est coché, on ajoute ses champs
        if (checkboxProp.checked) {
            additionalFields.innerHTML += `
                <label for="field2">Propriétaire :</label>
                <input type="text" id="assurance" name="assurance" placeholder="Assurance"><br>
            `;
        }
    }

    // Écouter les changements sur les deux checkboxes
    checkboxRes.addEventListener('change', updateFields);
    checkboxProp.addEventListener('change', updateFields);
});
