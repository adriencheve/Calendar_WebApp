<!DOCTYPE html>
<html lang="en">
<head>
	<title>Calendar (Static)</title>
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
    <button type="button" onclick="alert('PrevWeek')">
            Previous
    </button>
    <p> January 2015 </p>
    <button type="button" onclick="alert('NextWeek')">
            Next
    </button>
    <table align="center" border=1 cellpadding=2>
        <tr>
            <th>Sun <th>Mon <th>Tue <th>Wed <th>Thu <th>Fri <th>Sat
        </tr>
        <tr>
            <td> <td> <td> <td> 
	    <td onclick="alert('Example Event')">1</br>Example</br> Event</td>
	    <td>2 <td>3
        </tr>

    </table>
</body>
</html>