document.addEventListener('DOMContentLoaded', function() {
    const addCurrentLabBtn = document.getElementById('add-current-lab-btn');
    const addProposedLabBtn = document.getElementById('add-proposed-lab-btn');

    addCurrentLabBtn.addEventListener('click', addCurrentLab);
    addProposedLabBtn.addEventListener('click', addProposedLab);

    let currentLabNumber = 1;
    let proposedLabNumber = 1;

    function addCurrentLab() {
        const currentLabsData = document.getElementById('current-labs-data');
        const newRow = currentLabsData.insertRow();

        newRow.innerHTML = `
            <td>${currentLabNumber}</td>
            <td><input type="text" name="current_labs[${currentLabNumber}][lab_name]" placeholder="اسم المشغل/المختبر"></td>
            <td><input type="text" name="current_labs[${currentLabNumber}][notes]" placeholder="ملاحظات"></td>
        `;
        currentLabNumber++;
    }

    function addProposedLab() {
        const proposedLabsData = document.getElementById('proposed-labs-data');
        const newRow = proposedLabsData.insertRow();

        newRow.innerHTML = `
            <td>${proposedLabNumber}</td>
            <td><input type="text" name="proposed_labs[${proposedLabNumber}][lab_name]" placeholder="اسم المشغل/المختبر"></td>
            <td><input type="text" name="proposed_labs[${proposedLabNumber}][notes]" placeholder="ملاحظات"></td>
        `;
        proposedLabNumber++;
    }
});
