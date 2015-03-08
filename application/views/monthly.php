
<!DOCTYPE html>
<html lang="en">
<head>
	<title>{title}</title>
	<meta content="utf-8">
</head>

<body>
    <div>
        <div class="tableNavigation">
            <button type="button" class="navMonth previous" onclick="alert('PrevMonth')">
                    Previous
            </button>
            <p class="theMonth"> {month} </p>

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
            <tr>
                <td>{weekTwo}</td>
            </tr>
            <tr>
                <td class="event">{weekThree}</td>
            </tr>
            <tr>
                <td>{weekFour}</td>
            </tr>
            <tr>
                <td>{weekFive}</td>
            </tr>
        </table>
    </div>
</body>
</html>