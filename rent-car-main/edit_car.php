<?php
session_start();

include 'connect_db.php';

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
    $stmt->bind_param('i', $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();

    if (!$car) {
       echo "Car not found";
       exit();
    }
    
} else {
    echo "car_id not specified!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $availability = $_POST['availability'];
    $price_per_day = $_POST['price_per_day'];

    $stmt = $conn->prepare("UPDATE cars SET make = ?, model = ?, year = ?, availability = ?, price_per_day = ? WHERE car_id = ?");
    $stmt->bind_param('ssiidi', $make, $model, $year, $availability, $price_per_day, $car_id);

    if ($stmt->execute()) {
        echo "Car updated successfully!";
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Car Details</title>
    <style>
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem 0;
        }

        .edit-car-section {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: var(--width-sm);
        }

        .edit-form {
            background: var(--color-bg);
            padding: 3rem;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow);
            margin: 0 auto;
        }

        .edit-form h2 {
            color: var(--color-secondary);
            margin-bottom: 2rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-tertiary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border-radius: 0.3rem;
            background: var(--color-primary);
            color: var(--color-text);
            border: 1px solid var(--color-secondary);
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 2px rgba(107, 171, 214, 0.3);
        }

        .submit-btn {
            background: var(--color-secondary);
            color: var(--color-primary);
            padding: 0.8rem 2rem;
            border-radius: 0.3rem;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: var(--color-primary);
            color: var(--color-secondary);
            border: 1px solid var(--color-secondary);
        }

        /* Responsive adjustments */
        @media (max-width: 624px) {
            .edit-form {
                padding: 2rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <section class="edit-car-section">
        <div class="container">
            <form class="edit-form" action="edit_car.php?car_id=<?=$car_id?>" method="POST">
                <h2>Edit Car Details</h2>
                
                <div class="form-group">
                    <label for="make">Make</label>
                    <input type="text" id="make" name="make" value="<?=htmlspecialchars($car['make'])?>" required>
                </div>

                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" id="model" name="model" value="<?=htmlspecialchars($car['model'])?>" required>
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" id="year" name="year" value="<?=htmlspecialchars($car['year'])?>" required>
                </div>

                <div class="form-group">
                    <label for="availability">Availability</label>
                    <select name="availability" id="availability" required>
                        <option value="1" <?=$car['availability'] == 1 ? 'selected' : ''?>>Available</option>
                        <option value="0" <?=$car['availability'] == 0 ? 'selected' : ''?>>Not Available</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price_per_day">Price Per Day</label>
                    <input type="number" id="price_per_day" name="price_per_day" value="<?=htmlspecialchars($car['price_per_day'])?>" step=".01" required>
                </div>

                <button type="submit" class="submit-btn">Update Car Details</button>
            </form>
        </div>
    </section>
</body>
</html>