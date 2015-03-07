
<form method="post" id="theForm"> <!-- missing the action="??" part -->


    <fieldset>
        <legend> Create Event </legend>
        
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
            <input type="submit" class="SButton" value="Create" name="createEvent">
            <input type="reset" class="SButtonRight" value="Reset">
        </div>
        
    </fieldset>
</div>
