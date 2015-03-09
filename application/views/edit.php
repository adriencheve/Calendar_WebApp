<div id="container">

<form method="post" id="theForm"> <!-- missing the action="??" part -->

    <fieldset>
        <legend> Edit Event </legend>
        
        <div class="descriptionTag">
            Event Name: 
        </div>
        <input type="text" name="eventName">
        <br/>

        
        <div class="descriptionTag">
            Description:
        </div> 
        <textarea class="formDescription" name="description" form="theForm"></textarea>
        <br/>
        
        <div class="descriptionTag">
            Image:
        </div>
        <input type="file" class="image" accept="image/*" name="eventDescription">
        <br/>
        
        <div class="descriptionTag">
            Starting Date:
        </div>
        <input type="date" name="startingDate">
        <br/>
        
        <div class="descriptionTag">
            End Date:
        </div> 
        <input type="date" name="endDate">
        <br/>

        <div class="submitButton">
            <input type="submit" class="SButton" value="Edit" name="editEvent">
            <input type="submit" class="SButtonRight" value="Delete Event" name="deleteEvent">
            <!-- onclick for delete event should show a confirmation pop up-->
            <input type="reset" class="SButtonRight" value="Reset">
        </div>
        
    </fieldset>
</div>
