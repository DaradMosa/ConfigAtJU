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
            <td>${technicianNumber}</td>
            <td><input type="text" name="technicians[${technicianNumber}][full_name]" placeholder="الاسم الرباعي"></td>
            <td><input type="text" name="technicians[${technicianNumber}][nationality]" placeholder="الجنسية"></td>
            <td><input type="text" name="technicians[${technicianNumber}][qualification]" placeholder="المؤهل الفني"></td>
            <td><input type="number" name="technicians[${technicianNumber}][experience_years]" placeholder="عدد سنوات الخبرة"></td>
            <td><input type="text" name="technicians[${technicianNumber}][current_job]" placeholder="العمل الحالي"></td>
            <td><input type="text" name="technicians[${technicianNumber}][notes]" placeholder="ملاحظات"></td>
        `;
        technicianNumber++;
    }

    function addAdmin() {
        const adminsData = document.getElementById('admins-data');
        const newRow = adminsData.insertRow();

        newRow.innerHTML = `
            <td>${adminNumber}</td>
            <td><input type="text" name="admins[${adminNumber}][full_name]" placeholder="الاسم الرباعي"></td>
            <td><input type="text" name="admins[${adminNumber}][nationality]" placeholder="الجنسية"></td>
            <td><input type="text" name="admins[${adminNumber}][qualification]" placeholder="المؤهل الإداري"></td>
            <td><input type="number" name="admins[${adminNumber}][experience_years]" placeholder="عدد سنوات الخبرة"></td>
            <td><input type="text" name="admins[${adminNumber}][current_job]" placeholder="العمل الحالي"></td>
            <td><input type="text" name="admins[${adminNumber}][notes]" placeholder="ملاحظات"></td>
        `;
        adminNumber++;
    }
});
