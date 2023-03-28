function remove() {
  const b = document.getElementById("con");
  const d = document.getElementById("header");
  b.classList.add("none");
  d.classList.add("top");
}
function active1(){
  const user = document.getElementById("user_table")
  const student = document.getElementById("student_table")
  const help = document.getElementById("help")
  user.classList.add("active")
  student.classList.remove("active")
  help.classList.remove("active")
}
function active2(){
  const user = document.getElementById("user_table")
  const student = document.getElementById("student_table")
  const help = document.getElementById("help")
  student.classList.add("active")
  user.classList.remove("active")
  help.classList.remove("active")
}
function active3(){
  const user = document.getElementById("user_table")
  const student = document.getElementById("student_table")
  const help = document.getElementById("help")
  help.classList.add("active")
  user.classList.remove("active")
  student.classList.remove("active")
}