<div id="container">

<form method="post" action="createevent/validation"> <!-- missing the action="??" part -->

    <legend> Create Event </legend>

    <fieldset>
        Event Name:
        <input type="text" name="eventname">
        <br>

        Description:
        <input type="text" name="eventdescription">
        <br>

        Image:
        <input type="file" accept="image/*" name="image">
        <br>

        Starting Date:
        <input type="date" name="startdate">
        <br>

        End Date:
        <input type="date" name="enddate">
        <br>

        <input type="submit" value="Create">
        <input type="reset" value="reset">
    </fieldset>
</div>
