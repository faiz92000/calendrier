<!DOCTYPE html>
<html>
<head>
    <title>Calendrier</title>
    <style>
        .calendar {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .month {
            text-align: center;
            font-size: 24px;
            margin: 20px 0;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
        }

        .day {
            padding: 10px;
            border: 1px solid #ccc;
          background-color: #fff; 
        }
      .weekend {
        background-color: #f2f2f2; /* Couleur pour les jours de week-end */
    }
    </style>
</head>
<body>
    <div class="calendar">
        <div class="month">
            <a href="?prev">&lt;</a>
            <span>Month Year</span>
            <a href="?next">&gt;</a>
        </div>
        <div class="days">
    <div class="day">Lun</div>
    <div class="day">Mar</div>
    <div class="day">Mer</div>
    <div class="day">Jeu</div>
    <div class="day">Ven</div>
    <div class="day">Sam</div>
    <div class="day">Dim</div>
</div>
        <?php
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$firstDay = date('N', mktime(0, 0, 0, $month, 1, $year)); // 1 (Monday) to 7 (Sunday)
$daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));

$prevMonth = ($month == 1) ? 12 : $month - 1;
$prevYear = ($month == 1) ? $year - 1 : $year;
$nextMonth = ($month == 12) ? 1 : $month + 1;
$nextYear = ($month == 12) ? $year + 1 : $year;

$monthName = date('F', mktime(0, 0, 0, $month, 1, $year));

echo '<span class="month">';
echo '<a href="?month=' . $prevMonth . '&year=' . $prevYear . '">&lt;</a>';
echo $monthName . ' ' . $year;
echo '<a href="?month=' . $nextMonth . '&year=' . $nextYear . '">&gt;</a>';
echo '</span>';

echo '<div class="days">';

// Adjust the starting day of the week
$startingDay = $firstDay - 1;
for ($i = 0; $i < $startingDay; $i++) {
    echo '<div class="day"></div>';
}

// Display days in the correct order
for ($day = 1; $day <= $daysInMonth; $day++) {
    echo '<div class="day">' . $day . '</div>';
    if (($startingDay + $day) % 7 == 0) {
        echo '</div><div class="days">';
    }
}

echo '</div>';
?>

    </div>
</body>
</html>
