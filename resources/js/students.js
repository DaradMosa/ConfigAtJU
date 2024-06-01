document.addEventListener('DOMContentLoaded', function() {
    const addStudentBtn = document.getElementById('add-student-btn');

    addStudentBtn.addEventListener('click', addStudent);

    let studentNumber = 1;

    function addStudent() {
        const studentsData = document.getElementById('students-data');
        const newRow = studentsData.insertRow();

        newRow.innerHTML = `
            <td><input type="text" name="students[${studentNumber}][student_name]" placeholder="اسم الطالب الموفد"></td>
            <td><input type="text" name="students[${studentNumber}][specialization]" placeholder="التخصص الدقيق"></td>
            <td><input type="text" name="students[${studentNumber}][department]" placeholder="القسم /الكلية"></td>
            <td><input type="number" name="students[${studentNumber}][years]" placeholder="عدد سنوات الابتعاث"></td>
            <td><input type="text" name="students[${studentNumber}][university]" placeholder="اسم الجامعة"></td>
            <td><input type="text" name="students[${studentNumber}][ranking]" placeholder="اسم الجامعة"></td>
        `;
        studentNumber++;
    }
});
