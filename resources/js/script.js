document.addEventListener('DOMContentLoaded', function() {
document.getElementById("add-member-btn").addEventListener("click", function() {
    const facultyData = document.getElementById("faculty-data");
    const newRow = document.createElement("tr");
    
    newRow.innerHTML = `
        <td><input type="number" placeholder="الرقم"></td>
        <td><input type="text" placeholder="الاسم الرباعي"></td>
        <td><input type="date" placeholder="تاريخ الميلاد"></td>
        <td><input type="text" placeholder="الجنسية"></td>
        <td><input type="text" placeholder="المؤهلات العلمية"></td>
        <td><input type="text" placeholder="مجال التخصص الدقيق"></td>
        <td><input type="number" placeholder="سنة التخرج"></td>
        <td><input type="text" placeholder="الجامعة المتخرج فيها"></td>
        <td><input type="text" placeholder="الرتبة الأكاديمية"></td>
        <td><input type="date" placeholder="تاريخ منح الرتبة"></td>
        <td><input type="text" placeholder="الجهة المانحة للرتبة"></td>
        <td><input type="date" placeholder="سنة التعيين بالقسم"></td>
        <td><input type="text" placeholder="ملاحظات"></td>
    `;
    
    facultyData.appendChild(newRow);
});
});

