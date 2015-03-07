<!DOCTYPE html>
<html lang="en">
<head>
	<title>{title}</title>
	<meta content="utf-8">
	
<!-- Replaced with CSS at later point -->
<style>
        body {
            text-align:center;
        }
        fieldset {
            width:30%;
            margin-left:auto;
            margin-right:auto;
        }
        p {
            display:inline-block;
            width:50px;
            padding:5px;
        }
	table {
	    width: 80%;
	}
	tr {
	    height: 30px;
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
    <button type="button" onclick="alert('PrevMonth')">
            Previous
    </button>
    <p> {month} </p>
    <button type="button" onclick="alert('NextMonth')">
            Next
    </button>
    <table align="center" border=1 cellpadding=2>
        <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>
            <td>{weekOne}
        </tr>
        <tr>
            <td>{weekTwo}
        </tr>
        <tr>
            <td>{weekThree}
        </tr>
        <tr>
            <td>{weekFour}
        </tr>
        <tr>
            <td>{weekFive}
        </tr>
    </table>
</body>
</html>