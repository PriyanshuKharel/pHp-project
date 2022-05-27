<?php
include_once 'db.php';
include_once "nav.php";
if (!$isLoggedIn) {
    $_SESSION["error"] = "Please login first.";
    header("Location: login.php");
}
$oldCv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cv WHERE id = '" . $_SESSION['id'] . "'"));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump(1);
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $education = $_POST["education"];
    $work_experience = $_POST["work_experience"];
    $programming_skills = implode(",", $_POST["programming_skills"]);
    if ($oldCv)    $sql = "UPDATE cv SET name='$name', address='$address', email='$email', dob='$dob', education='$education', work_experience='$work_experience', programming_skills='$programming_skills' WHERE id='" . $_SESSION['id'] . "'";
    else $sql = "INSERT INTO cv (name, address, email, dob, education, work_experience, programming_skills, id) VALUES ('$name', '$address', '$email', '$dob', '$education', '$work_experience', '$programming_skills', '" . $_SESSION['id'] . "')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "User updated successfully.";
        header("Location: index.php");
    } else {
        $_SESSION["error"] = "Error updating CV.";
        header("Location: update.php");
    }
}
?>
<form method="POST">
<div class="form-control">
        <label>Your Name</label>
        <input required type="text" name="name" value="<?php echo $oldCv['name']; ?>">
    </div>
    <div class="form-control">
        <label>Address</label>
        <input required type="text" name="address" value="<?php echo $oldCv['address']; ?>">
    </div>
    <div class="form-control">
        <label>Email</label>
        <input required type="email" name="email" value="<?php echo $oldCv['email']; ?>">
    </div>
    <div class="form-control">
        <label>Date of Birth</label>
        <input required type="date" name="dob" value="<?php echo $oldCv['dob']; ?>">
    </div>
    <div class="form-control">
        <label>Education</label>
        <select required name="education">
            <option value="<?php echo $oldCv['education']; ?>"><?php echo $oldCv['education']; ?></option>
            <option value="High School">High School</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="PhD">PhD</option>
        </select>
    </div>
    <div class="form-control">
        <label>Work Experience</label>
        <input required type="number" name="work_experience" value="<?php echo $oldCv['work_experience']; ?>">
    </div>
    <div class="form-control">
        <label>Programming Skills</label>
        <input type="checkbox" name="programming_skills[]" value="python" <?php if (in_array("python", explode(",", $oldCv['programming_skills']))) echo "checked"; ?>>Python
        <input type="checkbox" name="programming_skills[]" value="java" <?php if (in_array("java", explode(",", $oldCv['programming_skills']))) echo "checked"; ?>>Java
        <input type="checkbox" name="programming_skills[]" value="php" <?php if (in_array("php", explode(",", $oldCv['programming_skills']))) echo "checked"; ?>>PHP
        <input type="checkbox" name="programming_skills[]" value="ruby" <?php if (in_array("ruby", explode(",", $oldCv['programming_skills']))) echo "checked"; ?>>Ruby

    </div>
    <div class="form-control">
        <button type="submit">Update</button>
</div>
</form>