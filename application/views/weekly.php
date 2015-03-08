
<!DOCTYPE html>
<html lang="en">
<head>
	<title>{title}</title>
	<meta content="utf-8">
</head>

<body>
    <div class="fullCalendar">
        <div class="tableNavigation">
            <button type="button" class="navMonth previous" onclick="alert('PrevMonth')">
                    Previous
            </button>
            <p class="theMonth"> {month} - {week} </p>

            <button type="button" class="navMonth next" onclick="alert('NextMonth')">
                    Next
            </button>
        </div>
        
        <table align="center">
            <tr class="sunToSat">
                <th class= "topLeft">Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th class="topRight">Sat</th>
            </tr>
            <tr>
                <td>{weekOne}</td>
            </tr>
        </table>
    </div>
</body>
</html>
