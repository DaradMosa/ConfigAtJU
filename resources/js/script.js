document.addEventListener('DOMContentLoaded', function() {
document.getElementById("add-member-btn").addEventListener("click", function() {
    const facultyData = document.getElementById("faculty-data");
    const newRow = document.createElement("tr");
    const rowCount = facultyData.getElementsByTagName("tr").length;

    newRow.innerHTML = `
    <td><input type="number" name="facultys[${rowCount}][number]" placeholder="الرقم"></td>
    <td><input type="text" name="facultys[${rowCount}][full_name]" placeholder="الاسم الرباعي"></td>
    <td><input type="date" name="facultys[${rowCount}][birth_date]" placeholder="تاريخ الميلاد"></td>
    <td><input type="text" name="facultys[${rowCount}][nationality]" placeholder="الجنسية"></td>
    <td><input type="text" name="facultys[${rowCount}][qualifications]" placeholder="المؤهلات العلمية"></td>
    <td><input type="text" name="facultys[${rowCount}][specialization]" placeholder="مجال التخصص الدقيق"></td>
    <td><input type="number" name="facultys[${rowCount}][graduation_year]" placeholder="سنة التخرج"></td>
    <td><input type="text" name="facultys[${rowCount}][university]" placeholder="الجامعة المتخرج فيها"></td>
    <td><input type="text" name="facultys[${rowCount}][academic_rank]" placeholder="الرتبة الأكاديمية"></td>
    <td><input type="date" name="facultys[${rowCount}][rank_date]" placeholder="تاريخ منح الرتبة"></td>
    <td><input type="text" name="facultys[${rowCount}][rank_grantor]" placeholder="الجهة المانحة للرتبة"></td>
    <td><input type="date" name="facultys[${rowCount}][appointment_year]" placeholder="سنة التعيين بالقسم"></td>
    <td><input type="text" name="facultys[${rowCount}][notes]" placeholder="ملاحظات"></td>
`;

    
    facultyData.appendChild(newRow);
});
});

