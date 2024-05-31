document.addEventListener('DOMContentLoaded', function() {
    const addTechnicianBtn = document.getElementById('add-technician-btn');
    const addAdminBtn = document.getElementById('add-admin-btn');

    addTechnicianBtn.addEventListener('click', addTechnician);
    addAdminBtn.addEventListener('click', addAdmin);

    let technicianNumber = 1;
    let adminNumber = 1;

    function addTechnician() {
        const techniciansData = document.getElementById('technicians-data');
        const newRow = techniciansData.insertRow();

        newRow.innerHTML = `
            <td>${technicianNumber++}</td>
            <td><input type="text" placeholder="الاسم الرباعي"></td>
            <td><input type="text" placeholder="الجنسية"></td>
            <td><input type="text" placeholder="المؤهل الفني"></td>
            <td><input type="number" placeholder="عدد سنوات الخبرة"></td>
            <td><input type="text" placeholder="العمل الحالي"></td>
            <td><input type="text" placeholder="ملاحظات"></td>
        `;
    }

    function addAdmin() {
        const adminsData = document.getElementById('admins-data');
        const newRow = adminsData.insertRow();

        newRow.innerHTML = `
            <td>${adminNumber++}</td>
            <td><input type="text" placeholder="الاسم الرباعي"></td>
            <td><input type="text" placeholder="الجنسية"></td>
            <td><input type="text" placeholder="المؤهل الإداري"></td>
            <td><input type="number" placeholder="عدد سنوات الخبرة"></td>
            <td><input type="text" placeholder="العمل الحالي"></td>
            <td><input type="text" placeholder="ملاحظات"></td>
        `;
    }
});
