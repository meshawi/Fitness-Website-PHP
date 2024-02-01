<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

$username = $_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="z.css">

    <script src="script.js" defer></script>
</head>
<body>
   
        
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="index.php">Home</a></li>
                <li><a href="#Aboutus">About us</a></li>
                <li><a href="#bmi-calculator">BMI</a></li>
                <li><a href="#caloric-needs">Caloric Calculator</a></li>
                <li><a href="#exercise-guide">Exercise Guide</a></li>
                <li><a href="profile.php">Profile </a></li>
            </ul>
            <a href="logout.php" class="login-btn">Logout</a>
        </nav>
    </header>

    <br>
    <!-- BMI Calculator Section -->
    <section id="bmi-calculator" class="page page-light">
        <h1>BODY MASS INDEX (BMI)</h1><br />
        <p
          >Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.
          Calculate your BMI to determine your goal. </p
        ><br /><hr /><br />
        <h1>BMI Calculator</h1>
        <div class="container">
        <form action="calculate_bmi.php" method="post">
            <label for="bmi-height">Your Height:</label><br />
            <input name="height" type="text" id="bmi-height" placeholder="Centimeters" /><br />
            <label for="bmi-weight">Your Weight:</label><br />
            <input name="weight" type="text" id="bmi-weight" placeholder="Kilograms" /><br /><br />
            <button type="submit" id="bmi-submit" class="btn btn-blue">Calculate BMI</button>

          </form>
    
          <div class="list-box">
            <h4 id="bmi-result">YOUR BMI = [Not Entered]</h4><br />
            <h3>BMI Categories:</h3>
            <ul>
              <li>Underweight: BMI &lt; 18.5 (Gain weight)</li>
              <li>Normal weight: 18.5 &lt; BMI &lt; 24.9 (Maintain)</li>
              <li>Overweight: BMI &gt; 24.9 (Loss weight)</li>
            </ul>
          </div>
        </div>
      </section>

    <!-- Caloric Calculator Section -->
    <section id="caloric-needs" class="page page-dark">
        <h1>CALORIC NEEDS</h1><br />
        <p
          >The Calorie Calculator can be used to estimate the number of calories a person needs to consume each day. This
          calculator can also provide some simple guidelines for gaining or losing weight.</p
        >
        <br /><hr /><br />
        <h1>Calorie Needing Calculator</h1>
        <div class="container">

        <form id="calorie-form" action="calculate_calories.php" method="post">
    Gender: <br />
    <input type="radio" id="male" name="gender" value="male" />
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" />
    <label for="female">Female</label><br />

    <label for="age">Age:</label><br />
    <input type="text" id="age" name="age" placeholder="15-80 years" /><br />

    <label for="calorie-height">Height:</label><br />
    <input type="text" id="calorie-height" name="height" placeholder="Centimeters" /><br />

    <label for="calorie-weight">Weight:</label><br />
    <input type="text" id="calorie-weight" name="weight" placeholder="Kilograms" /><br />

    <label for="activity">Activity:</label><br />
    <select name="activity" id="activity">
        <option value="basal">Basal Metabolic Rate (BMR)</option>
        <option value="sedentary">Sedentary: little or no exercise</option>
        <option value="light">Light: exercise 1-3 times/week</option>
        <option value="moderate">Moderate: exercise 4-5 times/week</option>
        <option value="active">Active: daily exercise or intense exercise 3-4 times/week</option>
        <option value="very-active">Very Active: intense exercise 6-7 times/week</option>
        <option value="extra-active">Extra Active: very intense exercise daily or physical job</option>
    </select><br /><br />

    <button type="submit" id="calorie-submit" class="btn btn-blue">Submit</button>
</form>

          <div class="list-box">
            <br /><h4 id="calorie-result">YOUR CALORIE NEEDING = [Not Entered]</h4><br />
            <h3>Guideline:</h3>
            <ul>
              <li>To Lose Weight: Take 250-500 minus your calorie needing.</li>
              <li>To Maintain: Take 0-200 minus or 0-200 plus your calorie needing.</li>
              <li>To Gain Weight: Take 250-500 plus your calorie needing.</li>
            </ul>
          </div>
        </div>
      </section>

    <!-- Exercise Guide Section -->
    <section id="exercise-guide">
        <div id="exercise-container">
            <h1 class="h1ss">Exercise Guide</h1>
    
            <label class="l1ss" for="exerciseSelect">Select an Exercise:</label>
            <select id="exerciseSelect">
                <option value="none">Select an exercise</option>
                <option value="air-squat">Air Squat</option>
                <option value="bench-press">Bench Press</option>
                <option value="burpee">Burpee</option>
                <option value="cable-cross">Cable Cross</option>
                <option value="cable-pullover">Cable Pullover</option>
                <option value="calf-raise">Calf Raise</option>
                <option value="chair-dips">Chair Dips</option>
                <option value="clean-and-press">Clean and Press</option>
                <option value="crunch">Crunch</option>
            </select>
    
            <button id="showExercise">Show Exercise</button>
    
            <div id="exercise-description">
                <img id="exercisePic" src="img\Man_practicing_exercise.svg" alt="Exercise Image">
                <h2>Exercise Description</h2>
                <p id="description-text">Select an exercise from the list to see the description.</p>
            </div>
        </div>
        </section>

    <!-- About Us Section -->
    <section class="Aboutus" id="Aboutus">
        <div class="main">
            <div class="all-text">
                <h4></h4>
                <h1>A fitness website</h1>
                <p>Users can achieve their fitness goals through the Fitness website, which offers services like calorie counting and food menu planning. Moreover, it keeps track of exercise and body composition.</p>
                
            </div>
        </div>
        </section>
        <footer>
    <div class="footer-content">
        <p>&copy; 2024 FE: Yazed Alaosaimi, BE: Mohammed Aleshawi.</p>
    </div>
</footer>


    <script src="z.js"></script>
</body>
</html>
