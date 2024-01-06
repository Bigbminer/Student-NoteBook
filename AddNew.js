let doc = document;
let typeName = "";
typeSelect = doc.getElementById("typeSelect");
AddCorriculum = doc.getElementById("AddCorriculum");
AddCourse = doc.getElementById("AddCourse");
AddTest = doc.getElementById("AddTest");
AddNotes = doc.getElementById("AddNotes");
AddPP = doc.getElementById("AddPP");
AcceptB = doc.getElementById("agreeCLabel");

function getType(typeN){
    typeName = typeN;
    typeSelect.style.visibility = "hidden";
    if(typeN == "Corriculum"){
        AddCorriculum.style.transition = "scale 300ms, background 300ms, margin 300ms, transform 300ms, visibility 300ms";
        AddCorriculum.style.marginTop = "10vh";
        AddCorriculum.style.transform = "translate(0px, -300px)";
        AddCorriculum.style.backgroundColor = "rgba(85, 85, 105, 0)";
        AddCorriculum.style.visibility = "visible";
    } else if(typeN == "Course"){
        AddCourse.style.transition = "scale 300ms, background 300ms, margin 300ms, transform 300ms, visibility 300ms";
        AddCourse.style.marginTop = "10vh";
        AddCourse.style.transform = "translate(0px, -300px)";
        AddCourse.style.backgroundColor = "rgba(85, 85, 105, 0)";
        AddCourse.style.visibility = "visible";
    } else if(typeN == "Notes"){
        AddNotes.style.transition = "scale 300ms, background 300ms, margin 300ms, transform 300ms, visibility 300ms";
        AddNotes.style.marginTop = "10vh";
        AddNotes.style.transform = "translate(0px, -300px)";
        AddNotes.style.backgroundColor = "rgba(85, 85, 105, 0)";
        AddNotes.style.visibility = "visible";
    } else if(typeN == "Test"){
        AddTest.style.transition = "scale 300ms, background 300ms, margin 300ms, transform 300ms, visibility 300ms";
        AddTest.style.marginTop = "10vh";
        AddTest.style.transform = "translate(0px, -300px)";
        AddTest.style.backgroundColor = "rgba(85, 85, 105, 0)";
        AddTest.style.visibility = "visible";
    } else if(typeN == "PP"){
        AddPP.style.transition = "scale 300ms, background 300ms, margin 300ms, transform 300ms, visibility 300ms";
        AddPP.style.marginTop = "10vh";
        AddPP.style.transform = "translate(0px, -300px)";
        AddPP.style.backgroundColor = "rgba(85, 85, 105, 0)";
        AddPP.style.visibility = "visible";
    }
}

