<div class="row">
<div class="card col-md-7 mx-auto my-1">
<?php 
include("includes/form.inc.html");
?>
</div> 
<div class="card col-md-4 mx-auto my-1">
<header class="text-start">Connaissances</header>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="HTML" name="html" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    HTML
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="CSS" name="css" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    CSS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JavaScript" name="javascript" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    JavaScript
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="PHP" name="php" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="MySQL" name="mysql" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Bootstrap" name="bootstrap" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Bootstrap
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Symfony" name="symfony" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="React" name="react" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    React
                </label>
            </div>
            <label for="colorpicker">Couleur préférée:</label>
            <input type="color" id="color" name="color" value="#0000ff">

            <label for="birthday">Date de naissance</label>
            <input type="date" id="birthday" name="birthday">
            
</div>

<div class="card col-11 mx-auto my-1">
    <div class="form-group">
      <label for="formFile" class="form-label mt-4"><p>joindre une image(jpg ou png)</p></label>
      <input class="form-control" type="file" id="formFile">
    </div>
</div>
<div class="d-flex flex-row-reverse bd-highlight mt-4">
         <button type="submit" name="save" class="btn btn-primary">Enregistrer les données</button>
</div>

