<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .subtitle {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-2 text-center">Job Application Form</h1>
        <p class="text-center subtitle">Kim Samin</p>
        <form action="index.php" method="POST" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="specialization" class="form-label">Specialization</label>
                <input type="text" class="form-control" name="specialization" required>
            </div>
            <div class="mb-3">
                <label for="year_of_exp" class="form-label">Years of Experience</label>
                <input type="number" class="form-control" name="year_of_exp" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Programming Language</label>
                <input type="text" class="form-control" name="language" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $year_of_exp = $_POST['year_of_exp'];
    $language = $_POST['language'];

    $stmt = $pdo->prepare("INSERT INTO job_applications (firstname, lastname, email, specialization, year_of_exp, language) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $email, $specialization, $year_of_exp, $language]);

    echo "Job Application Submitted!";
}
?>
