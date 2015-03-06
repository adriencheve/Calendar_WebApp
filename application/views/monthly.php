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
        {table}
        <!-- <tr>
            <td> <td> <td> <td> 
	    <td onclick="alert('Example Event')">1</br>Example</br> Event</td>
	    <td>2 <td>3
        </tr>
        <tr>
            <td>4 <td>5 <td>6 <td>7 <td>8 <td>9 <td>10
        </tr>
        <tr>
            <td>11 <td>12 <td>13 <td>14 <td>15 <td>16 <td>17
        </tr>
        <tr>
            <td>18 <td>19 <td>20 <td>21 <td>22 <td>23 <td>24
        </tr>
        <tr>
            <td>25 <td>26 <td>27 <td>28 <td>29 <td>30 <td>
        </tr> -->
    </table>
</body>
</html>