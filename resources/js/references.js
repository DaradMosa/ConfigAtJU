document.addEventListener('DOMContentLoaded', function() {
    const addReferenceBtn = document.getElementById('add-reference-btn');

    addReferenceBtn.addEventListener('click', addReference);

    let referenceNumber = 1;

    function addReference() {
        const referencesData = document.getElementById('references-data');
        const newRow = referencesData.insertRow();

        newRow.innerHTML = `
            <td>${referenceNumber++}</td>
            <td><input type="text" placeholder="المرجع المطلوب"></td>
            <td>
                <select>
                    <option value="متوفر">متوفر</option>
                    <option value="غير متوفر">غير متوفر</option>
                </select>
            </td>
            <td><input type="text" placeholder="ملاحظات"></td>
        `;
    }
});
