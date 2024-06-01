document.addEventListener('DOMContentLoaded', function() {
    const addReferenceBtn = document.getElementById('add-reference-btn');

    addReferenceBtn.addEventListener('click', addReference);

    let referenceNumber = 1;

    function addReference() {
        const referencesData = document.getElementById('references-data');
        const newRow = referencesData.insertRow();

        newRow.innerHTML = `
            <td>${referenceNumber}</td>
            <td><input type="text" name="references[${referenceNumber}][required_reference]" placeholder="المرجع المطلوب"></td>
            <td>
                <select name="references[${referenceNumber}][status]">
                    <option value="متوفر">متوفر</option>
                    <option value="غير متوفر">غير متوفر</option>
                </select>
            </td>
            <td><input type="text" name="references[${referenceNumber}][notes]" placeholder="ملاحظات"></td>
        `;
        referenceNumber++;
    }
});
