document.addEventListener('DOMContentLoaded', function() {
    const addStudentBtn = document.getElementById('add-student-btn');

    addStudentBtn.addEventListener('click', addStudent);

    function addStudent() {
        const studentsData = document.getElementById('students-data');
        const newRow = studentsData.insertRow();

        newRow.innerHTML = `
            <td><input type="text" placeholder="اسم الطالب الموفد"></td>
            <td><input type="text" placeholder="التخصص الدقيق"></td>
            <td><input type="text" placeholder="القسم /الكلية"></td>
            <td><input type="number" placeholder="عدد سنوات الابتعاث"></td>
            <td><input type="text" placeholder="اسم الجامعة"></td>
            <td>
                <select>
                    <option value="QS">QS</option>
                    <option value="ARWU">ARWU</option>
                </select>
            </td>
        `;
    }
});
