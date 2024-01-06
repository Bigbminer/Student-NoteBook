let doc = document;

//Student & teacher sign up stuff
let isTeacher = -1;
let studentCheckbox = doc.getElementById("studentDiv");
let teacherCheckbox = doc.getElementById("teacherDiv");

//isTeacher function
function checkTeacher(isStudent){
    isTeacher = isStudent;
    if(isStudent == 1){
      studentCheckbox.style.transition = "scale 200ms, border 200ms";
      studentCheckbox.style.scale = "1.02";
      studentCheckbox.style.border = "5px white solid";
      teacherCheckbox.style.transition = "scale 200ms, border 200ms";
      teacherCheckbox.style.scale = "1";
      teacherCheckbox.style.border = "none";
    } else {
      studentCheckbox.style.transition = "scale 200ms, border 200ms";
      studentCheckbox.style.scale = "1";
      studentCheckbox.style.border = "none";
      teacherCheckbox.style.transition = "scale 200ms, border 200ms";
      teacherCheckbox.style.scale = "1.02";
      teacherCheckbox.style.border = "5px white solid";
    }
}

function isTeacherOnHover(isStudent){
    if(isStudent && isTeacher != 1){
        studentCheckbox.style.transition = "scale 200ms, border 200ms";
        studentCheckbox.style.scale = "1.01";
        studentCheckbox.style.border = "0px white solid";
    } else if(isTeacher != 0){
        teacherCheckbox.style.transition = "scale 200ms, border 200ms";
        teacherCheckbox.style.scale = "1.01";
        teacherCheckbox.style.border = "0px black solid";
    }
}

function isTeacherOut(isStudent){
    if(isStudent && isTeacher != 1){
        studentCheckbox.style.transition = "scale 200ms, border 200ms";
        studentCheckbox.style.scale = "1";
        studentCheckbox.style.border = "0px white solid";
    } else if(isTeacher != 0){
        teacherCheckbox.style.transition = "scale 200ms, border 200ms";
        teacherCheckbox.style.scale = "1";
        teacherCheckbox.style.border = "0px white solid";
    }
}