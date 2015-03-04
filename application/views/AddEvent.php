<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Event</title>
		<meta content="utf-8">
        <style>
            body {
                text-align:center;
            }
            fieldset {
                width:30%;
                margin-left:auto;
                margin-right:auto;
            }
            label {
                display:inline-block;
                width:50px;
                padding:5px;
            }
            table, th, td {
                border: 1px solid black;
            }
            button {
                margin:5px;
            }
        </style>
	</head>
	<body>
		<h2>
			Add Event
		</h2>
        <form>
            <fieldset>
                <label for="eName">Name</label>
                    <input type="text" id="eName" name="name">
                <br>
                <label for="eTime">Time</label>
                    <input type="text" id="eTime" name="time">
                <br>
                <table>
                    <tr>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                    <tr>
                        <td>No Events</td>
                        <td>No Events</td>
                        <td>No Events</td>
                        <td>No Events</td>
                        <td>No Events</td>
                        <td>No Events</td>
                        <td>No Events</td>
                    </tr>
                </table>
                <button type="button" onclick="alert('Hello World!')">
                    Create Event
                </button>
            </fieldset>
        </form>
	</body>
</html>

