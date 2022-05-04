const confirmDelete = () => {
  return confirm("Delete this quiz?");
};
const validateQuizForm = () => {
  const form = document.getElementById("newQuiz");
  if (document.getElementById("nameinput").value == "") {
    alert("Please enter the name");
  } else {
    console.log("submitting");
    form.submit();
  }
};
