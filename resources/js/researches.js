document.addEventListener('DOMContentLoaded', function() {
document.getElementById("add-research-btn").addEventListener("click", function() {
    const researchesData = document.getElementById("researches-data");
    const newRow = document.createElement("tr");

    newRow.innerHTML = `
        <td><input type="number" placeholder="الرقم"></td>
        <td><input type="text" placeholder="الاسم الرباعي"></td>
        <td><input type="text" placeholder="اسم البحث"></td>
        <td><input type="text" placeholder="اسم المجلة"></td>
        <td><input type="number" placeholder="رقم العدد (رقم الصفحة)"></td>
        <td><input type="text" placeholder="قاعدة البيانات المنشور فيها"></td>
    `;

    researchesData.appendChild(newRow);
});
});