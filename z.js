// Declare elements:
const bmiForm = document.getElementById("bmi-form");
const bmiSubmit = document.getElementById("bmi-submit");
const calorieForm = document.getElementById("calorie-form");
const calorieSubmit = document.getElementById("calorie-submit");
// *****************

// BMI Calculator
bmiSubmit.addEventListener("click", function (event) {
  const height = parseFloat(document.getElementById("bmi-height").value) / 100;
  const weight = parseFloat(document.getElementById("bmi-weight").value);
  const result = weight / (height * height);

  if (!isNaN(result) && result > 0) {
    if (result < 18.5)
      document.getElementById("bmi-result").innerHTML = "YOUR BMI = " + result.toFixed(1) + " (Underweight)";
    else if (result < 24.9)
      document.getElementById("bmi-result").innerHTML = "YOUR BMI = " + result.toFixed(1) + " (Normal weight)";
    else
      document.getElementById("bmi-result").innerHTML = "YOUR BMI = " + result.toFixed(1) + " (Overweight)";
  }
  else {
    alert("Please enter a valid input!");
  }
});
// *****************


// Calorie Calculator:
calorieSubmit.addEventListener("click", function (event) {
  // Declarations:
  let bmr, need;
  const gender = document.getElementsByName("gender");
  const age = parseInt(document.getElementById("age").value);
  const height = parseFloat(document.getElementById("calorie-height").value);
  const weight = parseFloat(document.getElementById("calorie-weight").value);
  const activity = document.getElementById("activity").selectedIndex;

  // Inputs are valid:
  if (age <= 80 && age >= 15 && height > 0 && weight > 0) {
    // Male:
    if (gender[0].checked) {
      bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
    }
    //Female:
    else if (gender[1].checked) {
      bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
    }
    // Gender unchecked:
    else {
      alert("Please enter a valid input!");
      return;
    }
    if (activity == 0) need = bmr;
    else if (activity == 1) need = bmr * 1.2;
    else if (activity == 2) need = bmr * 1.465;
    else if (activity == 3) need = bmr * 1.375;
    else if (activity == 4) need = bmr * 1.55;
    else if (activity == 5) need = bmr * 1.725;
    else need = bmr * 1.9;

    document.getElementById("calorie-result").innerHTML = "YOUR CALORIE NEEDING = " + Math.round(need) + " cal/day";
  }
  // Inputs are invalid:
  else
    alert("Please enter a valid input!");
});
// *****************


document.getElementById("showExercise").addEventListener("click", function (event) {
    const select = document.getElementById("exerciseSelect").value;
    const exercisePic = document.getElementById("exercisePic");
    const descriptionText = document.getElementById("description-text");

    switch (select) {
        case "air-squat":
            descriptionText.innerHTML = "Air Squats are bodyweight exercises that primarily target the quadriceps and glutes.";
            exercisePic.src = "img/exercisesPic/air-squat.svg";
            break;
        case "bench-press":
            descriptionText.innerHTML = "Bench Press is a strength training exercise that works the chest, shoulders, and triceps.";
            exercisePic.src = "img/exercisesPic/bench-press.svg";
            break;
        case "burpee":
            descriptionText.innerHTML = "Burpees are a full-body exercise that involves squatting, jumping, and push-ups.";
            exercisePic.src = "img/exercisesPic/burpee.svg";
            break;
        case "cable-cross":
            descriptionText.innerHTML = "Cable Crossover is an isolation exercise that targets the chest muscles.";
            exercisePic.src = "img/exercisesPic/cable-cross.svg";
            break;
        case "cable-pullover":
            descriptionText.innerHTML = "Cable Pullover is an exercise that targets the latissimus dorsi and serratus anterior muscles.";
            exercisePic.src = "img/exercisesPic/cable-pullover.svg";
            break;
        case "calf-raise":
            descriptionText.innerHTML = "Calf Raises are exercises that target the muscles of the calf.";
            exercisePic.src = "img/exercisesPic/calf-raise.svg";
            break;
        case "chair-dips":
            descriptionText.innerHTML = "Chair Dips are a triceps exercise that can be performed using a sturdy chair or bench.";
            exercisePic.src = "img/exercisesPic/chair-dips.svg";
            break;
        case "clean-and-press":
            descriptionText.innerHTML = "Clean and Press is a compound exercise that works multiple muscle groups, including shoulders and legs.";
            exercisePic.src = "img/exercisesPic/clean-and-press.svg";
            break;
        case "crunch":
            descriptionText.innerHTML = "Crunches are abdominal exercises that target the rectus abdominis.";
            exercisePic.src = "img/exercisesPic/crunch.svg";
            break;
        default:
            descriptionText.innerHTML = "Select an exercise from the list to see the description.";
            exercisePic.src = "";
    }
});

const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup.querySelector(".close-btn");
const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

// Show mobile menu
hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
});

// Hide mobile menu
hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

// Show login popup
showPopupBtn.addEventListener("click", () => {
    document.body.classList.toggle("show-popup");
});

// Hide login popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

// Show or hide signup form
signupLoginLink.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
    });
});