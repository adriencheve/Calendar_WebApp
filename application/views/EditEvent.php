<div id="container">

<form method="post"> <!-- missing the action="??" part -->

    <legend> Edit Event </legend>

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

        <input type="submit" value="edit" name="editEvent">
        <input type="submit" value="delete event" name="deleteEvent">
        <!-- onclick for delete event should show a confirmation pop up-->
        <input type="reset" value="reset">
    </fieldset>
</div>
