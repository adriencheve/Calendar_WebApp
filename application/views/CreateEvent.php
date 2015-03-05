<div id="container">

<form method="post"> <!-- missing the action="??" part -->

    <legend> Create Event </legend>

    <fieldset>
        Event Name: 
        <input type="text" name="eventName">
        <br>

        Description: 
        <input type="text" name="eventDescription">
        <br>
        
        Image:
        <input type="file" accept="image/*" name="eventDescription">
        <br>
        
        Starting Date:
        <input type="date" name="startingDate">
        <br>
        
        End Date: 
        <input type="text" name="endDate">
        <br>

        <input type="submit" value="Create">
        <input type="reset" value="reset">
    </fieldset>
</div>

