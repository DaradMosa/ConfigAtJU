document.addEventListener('DOMContentLoaded', function() {
document.getElementById("add-research-btn").addEventListener("click", function() {
    const researchesData = document.getElementById("researches-data");
    const newRow = document.createElement("tr");
    const index = researchesData.children.length;

    newRow.innerHTML = `
    <td><input type="number" name="researches[${index}][number]" placeholder="الرقم"></td>
    <td><input type="text" name="researches[${index}][full_name]" placeholder="الاسم الرباعي"></td>
    <td><input type="text" name="researches[${index}][research_name]" placeholder="اسم البحث"></td>
    <td><input type="text" name="researches[${index}][journal_name]" placeholder="اسم المجلة"></td>
    <td><input type="number" name="researches[${index}][issue_number]" placeholder="رقم العدد (رقم الصفحة)"></td>
    <td><input type="text" name="researches[${index}][database_name]" placeholder="قاعدة البيانات المنشور فيها"></td>
    `;

    researchesData.appendChild(newRow);
});
});