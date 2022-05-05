const confirmDelete = () => {
  return confirm("Delete this?");
};
const validateQuizForm = () => {
  const form = document.getElementById("newQuiz");
  if (document.getElementById("nameinput").value == "") {
    alert("Please enter the name");
  } else {
    form.submit();
  }
};
